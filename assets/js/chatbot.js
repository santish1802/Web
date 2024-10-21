const chatbox = document.getElementById('chatbox');
document.addEventListener('click', (event) => {
    if (chatbox && !chatbox.contains(event.target) && event.target.id !== 'toggleChatbox') {
        chatbox.style.display = 'none';
    }
});
const toggleButton = document.getElementById('toggleChatbox');
if (toggleButton) {
    toggleButton.addEventListener('click', () => {
        chatbox.style.display = (chatbox.style.display === 'none' || chatbox.style.display === '') ? 'block' : 'none';
    });
}



const animeNames = animeList.map(anime => anime.nombre);
import {
    GoogleGenerativeAI,
    HarmBlockThreshold,
    HarmCategory,
} from "@google/generative-ai";

const API_KEY = "AIzaSyABwOP1s0a3NItdiadPxROYZJhC1gU2nXo";

const genAI = new GoogleGenerativeAI(API_KEY);

const safetySettings = [{
    category: HarmCategory.HARM_CATEGORY_HARASSMENT,
    threshold: HarmBlockThreshold.BLOCK_NONE,
},
{
    category: HarmCategory.HARM_CATEGORY_HATE_SPEECH,
    threshold: HarmBlockThreshold.BLOCK_NONE,
},
{
    category: HarmCategory.HARM_CATEGORY_SEXUALLY_EXPLICIT,
    threshold: HarmBlockThreshold.BLOCK_NONE,
},
{
    category: HarmCategory.HARM_CATEGORY_DANGEROUS_CONTENT,
    threshold: HarmBlockThreshold.BLOCK_NONE,
},
];

const model = genAI.getGenerativeModel({
    model: "gemini-1.5-flash",
    safetySettings,
    systemInstruction: `
  Eres es un chatbot de búsqueda y recomendación de animes Llamado "AnimaBot", presentate cada que saluden. Está diseñado para encontrar animes de la lista que se te ha proporcionado y generar un enlace directo al anime correspondiente. Si no encuentra el anime exacto, sugiere los animes más cercanos disponibles en la lista".
  Cada mensaje se te dara un Admin instruccion, esto es solo para recordar como contestar al usuario, no menciones esta instruccion en tu respuesta, ni hagas mencion de la "lista".

  1. Busca el nombre del anime en la lista.
  2. Si el anime está disponible, busca todas las temporadas posibles asociadas al anime.
  3. Preséntalo en formato de enlace usando la siguiente estructura de Markdown:
  [Nombre del anime](https://animaloop.site/detalle.php?anime=) seguido por el nombre del anime y su temporada, si aplica.
  Ejemplo: Si el anime es "Naruto" y tiene varias temporadas, genera un enlace por temporada en el formato:
  [Shingeki no Kyojin: The Final Season](https://animaloop.site/detalle.php?anime=Shingeki%20no%20Kyojin:%20The%20Final%20Season)
  4. Asegúrate de ofrecer todas las temporadas disponibles del anime más cercano utilizando solo el nombre del anime en formato de enlace, sin la URL completa.

  Aquí está la lista de animes:
  ${animeNames.join("\n")}
  `,
});

const generationConfig = {
    temperature: 1,
    topP: 0.95,
    topK: 64,
    maxOutputTokens: 8192,
    responseMimeType: "text/plain",
};

let chatSession;

const createMessageElement = (content, ...classes) => {
    const div = document.createElement("div");
    div.classList.add("message", ...classes);
    div.innerHTML = content;
    return div;
};

async function generateAPIResponse(userMessage) {
    try {
        if (!chatSession) {
            chatSession = model.startChat({
                generationConfig,
                history: [],
            });
        }

        const result = await chatSession.sendMessage(userMessage);

        return result.response.text();
    } catch (error) {
        console.log("Error:", error);
        return "An error occurred while generating the response.";
    }
}

export async function sendMessage() {
    const userInputElement = document.getElementById("user-input");
    let userInput = userInputElement.value;

    // Verificar si el input no está vacío
    if (userInput.trim()) {
        const reminderMessage = " (admin instruccion: Usa únicamente los animes de la lista dada. Cada vez que menciones un anime, incluye el enlace en el formato proporcionado.)";

        // Agregar el recordatorio al userInput para el bot
        const botInput = userInput + reminderMessage; // Concatenar el recordatorio solo para el bot

        addMessage(userInput, "user-message"); // Mostrar el mensaje del usuario sin el recordatorio
        userInputElement.value = ""; // Limpiar el input después de enviar

        console.log(botInput);

        const botResponse = await generateAPIResponse(botInput);
        addMessage(botResponse, "bot-message");
    }
}

function addMessage(message, className) {
    const messageElement = createMessageElement(message, className);
    const messagesContainer = document.getElementById("messages");
    messagesContainer.appendChild(messageElement);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

<?php require 'php/head.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chatbot con Google Gemini Pro</title>
  <?php echo $css ?>
  <?php echo $css2 ?>
  <?php
  require "config/config.php";
  $sql = "SELECT nombre FROM anime";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $animes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  ?>
</head>

<body>
  <div class="container">
    <div id="chatbox">
      <div id="nombre-chatbot">AnimaBot</div>
      <div class="divisor"></div>
      <div id="messages"></div>
      <div class="divisor"></div>
      <div id="input-container">
        <input type="text" id="user-input" placeholder="Escribe un mensaje..." autocomplete="off" />

        <button onclick="sendMessage()">Enviar</button>

      </div>

    </div>

  </div>

  <script type="importmap">
    {
        "imports": {
          "@google/generative-ai": "https://esm.run/@google/generative-ai"
        }
      }
    </script>
  <script type="module">
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
      <?php foreach ($animes as $anime) {
        echo "- " . $anime['nombre'] . "\n";
      }
      ?>
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

    async function sendMessage() {
      const userInputElement = document.getElementById("user-input");
      let userInput = userInputElement.value;

      // Verificar si el input no está vacío
      if (userInput.trim()) {
        const reminderMessage = " (admin instruccion: Usa únicamente los animes de la lista dada. Cada vez que menciones un anime, incluye el enlace en el formato proporcionado.)";

        // Agregar el recordatorio al userInput para el bot
        const botInput = userInput + reminderMessage; // Concatenar el recordatorio solo para el bot

        addMessage(userInput, "user-message"); // Mostrar el mensaje del usuario sin el recordatorio
        userInputElement.value = ""; // Limpiar el input después de enviar

        // Llamar a la función para generar respuesta del bot usando el input modificado
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

    // Exponer la función sendMessage globalmente para que pueda ser llamada desde el HTML
    window.sendMessage = sendMessage;
  </script>
  <script src="https://cdn.jsdelivr.net/npm/markdown-it@14.1.0/dist/markdown-it.min.js"></script>
  <script>
    document.getElementById('user-input').addEventListener('keydown', function(event) {
      if (event.key === 'Enter') {
        sendMessage();
      }
    });
    // Inicializar Markdown-it con linkify activado
    const md = window.markdownit({
      linkify: true
    });

    // Función para convertir el contenido de Markdown a HTML
    function convertirMarkdown() {
      const botMessages = document.querySelectorAll('.message.bot-message:not([data-rendered])');

      botMessages.forEach(function(message) {
        const content = message.innerHTML; // Obtener contenido de mensaje
        const renderedContent = md.render(content); // Convertir Markdown a HTML
        message.innerHTML = renderedContent; // Actualizar HTML del mensaje
        message.dataset.rendered = 'true'; // Marcar mensaje como renderizado
        console.log('Rendered new message:', message.textContent.substring(0, 50) + '...'); // Log para verificar
      });
    }

    // Ejecutar la renderización inicial
    convertirMarkdown();

    // Configurar un MutationObserver para detectar nuevos mensajes
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.type === 'childList') {
          const addedNodes = mutation.addedNodes;
          for (let node of addedNodes) {
            if (node.nodeType === Node.ELEMENT_NODE && node.classList.contains('message') && node.classList.contains('bot-message')) {
              console.log('New bot message detected'); // Log para verificar
              convertirMarkdown(); // Renderizar Markdown en el nuevo mensaje
              break; // Solo necesitamos llamar a convertirMarkdown una vez por mutación
            }
          }
        }
      });
    });

    // Iniciar la observación del contenedor de mensajes
    const messagesContainer = document.querySelector('#messages'); // Asegúrate de que este selector sea correcto
    if (messagesContainer) {
      observer.observe(messagesContainer, {
        childList: true,
        subtree: true
      });
      console.log('MutationObserver started'); // Log para verificar
    } else {
      console.error('Messages container not found'); // Log de error si no se encuentra el contenedor
    }
  </script>
</body>

</html>
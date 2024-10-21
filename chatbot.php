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
    <div id="toggleChatbox" class="btn btn-primary">Toggle</div>
    <div id="chatbox" style="display: none;">
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
  <script type="text/javascript">
    const animeList = <?php echo json_encode($animes); ?>;
  </script>
  <script type="module">
    import {
      sendMessage
    } from '/assets/js/chatbot.js';
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
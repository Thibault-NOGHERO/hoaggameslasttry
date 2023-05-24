// Récupérer tous les boutons "ajouter ami"
var addFriendButtons = document.querySelectorAll('.add-friend');
// Boucle à travers chaque bouton et ajouter un événement "click"
addFriendButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Récupérer l'ID de l'ami à ajouter à partir de l'attribut "data-friend-id"
        var friendId = this.dataset.friendId;
        // Envoyer une requête AJAX pour appeler le fichier PHP "ajouter_amis.php"
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajouter_amis.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                // La requête est terminée avec succès
                // Actualiser la page pour afficher les nouveaux amis
                window.location.reload();
            }
        };
        xhr.send('friend_id=' + friendId);
    });
});
// Récupérer tous les boutons "accepter ami"
var acceptFriendButtons = document.querySelectorAll('.accept-friend');
// Boucle à travers chaque bouton et ajouter un événement "click"
acceptFriendButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Récupérer l'ID de l'ami à accepter à partir de l'attribut "data-friend-id"
        var friendId = this.dataset.friendId;
        // Envoyer une requête AJAX pour appeler le fichier PHP "accepter_amis.php"
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'accepter_amis.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                // La requête est terminée avec succès
                // Actualiser la page pour afficher les nouveaux amis
                window.location.reload();
            }
        };
        xhr.send('friend_id=' + friendId);
    });
});
const addFriendButtons = document.querySelectorAll('.add-friend');

addFriendButtons.forEach((button) => {
    button.addEventListener('click', () => {
        const friendId = button.dataset.friendId;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajouter_amis.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Traitement de la réponse du serveur
                console.log(xhr.responseText);
            }
            else {
                console.error('Une erreur est survenue');
            }
        };
        xhr.send(`friend_id=${friendId}`);
    });
});

// Attendez que le contenu du DOM soit chargé avant d'exécuter le code
document.addEventListener("DOMContentLoaded", () => {
  // Sélectionnez le formulaire d'envoi de message et la liste des messages dans le DOM
  const sendMessageForm = document.querySelector(".send-message-form");
  const messageList = document.querySelector(".message-list");
  // Ajoutez un écouteur d'événement pour détecter la soumission du formulaire d'envoi de message
  sendMessageForm.addEventListener("submit", async (e) => {
    // Empêchez le comportement par défaut de soumission du formulaire (rechargement de la page)
    e.preventDefault();
    // Récupérez la valeur du champ de message
    const messageInput = sendMessageForm.querySelector("input[name='message']");
    const message = messageInput.value;
    // Si le message n'est pas vide, envoyez-le au serveur
    if (message) {
      try {
        // Utilisez fetch pour envoyer une requête POST avec le contenu du formulaire
        const response = await fetch("send_message.php", {
          method: "POST",
          body: new FormData(sendMessageForm),
        });

        // Si la réponse est OK, videz le champ de message et rechargez les messages
        if (response.ok) {
          messageInput.value = "";
          loadMessages();
        }
      }
     catch (error) {
      console.error("Error:", error);
    }
  }
});

// Fonction pour charger les messages à partir du serveur et les afficher dans la liste des messages
async function loadMessages() {
  try {
    // Récupérez l'ID de l'ami à partir des paramètres de l'URL
    const friendId = new URLSearchParams(window.location.search).get("user_id");
    // Utilisez fetch pour envoyer une requête GET pour récupérer les messages pour cet ami
    const response = await fetch(`get_messages.php?user_id=${friendId}`);
    // Si la réponse est OK, mettez à jour la liste des messages avec les nouveaux messages
    if (response.ok) {
      const messages = await response.text();
      messageList.innerHTML = messages;
    }
  } catch (error) {
    console.error("Error:", error);
  }
}

// Rechargez les messages toutes les 5 secondes (5000 ms) pour afficher les nouveaux messages en temps réel
setInterval(loadMessages, 5000);
});
const removeFriendButtons = document.querySelectorAll('.remove-friend');
removeFriendButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        const friendId = this.dataset.friendId;
        fetch('supprimer_amis.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'friend_id=' + friendId
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Ami supprimé avec succès !');
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

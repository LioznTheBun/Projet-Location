document.addEventListener('DOMContentLoaded', function() {
    var conversationItems = document.querySelectorAll('.conversation-list-item');
  
    conversationItems.forEach(function(item) {
      item.addEventListener('click', function() {
        var conversationId = item.getAttribute('data-conversation-id');
        window.location.href = 'index.php?page=message&idConversation=' + conversationId;
        console.log('index.php?page=message&idConversation=' + conversationId);
      });
    });
  });

  function showConversationInput() {
    var conversationInput = document.getElementById('conversation-input');
    var submitButton = document.getElementById('submit-button');
    
    conversationInput.style.display = 'block';
    submitButton.style.display = 'block';
  }
  
  
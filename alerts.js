/**
 * Alerts JavaScript
 */


// Custom Alert/Confirm variables
  let confirmCallback = null;
  let alertCallback = null;

  // Custom Alert function
  function showAlert(type, title, message, callback) {
    const alertModal = document.getElementById('customAlert');
    const alertHeader = document.getElementById('alertHeader');
    const alertIcon = document.getElementById('alertIcon');
    const alertTitle = document.getElementById('alertTitle');
    const alertMessage = document.getElementById('alertMessage');

    // Reset classes
    alertHeader.className = `alert-header ${type}`;

    // Set content based on type
    switch (type) {
      case 'success':
        alertIcon.textContent = '✅';
        break;
      case 'error':
        alertIcon.textContent = '❌';
        break;
      case 'warning':
        alertIcon.textContent = '⚠️';
        break;
      case 'status-warning':
        alertIcon.textContent = '⚠️';
        break;
      default:
        alertIcon.textContent = 'ℹ️';
    }

    alertTitle.textContent = title;

    // Handle different message types
    if (Array.isArray(message)) {
      alertMessage.innerHTML = '<ul>' + message.map(m => '<li>' + m + '</li>').join('') + '</ul>';
    } else if (typeof message === 'object' && message !== null) {
      alertMessage.innerHTML = '<pre>' + JSON.stringify(message, null, 2) + '</pre>';
    } else {
      alertMessage.textContent = message;
    }

    alertModal.classList.add('show');
    document.body.style.overflow = 'hidden';
    alertCallback = callback || null;
  }

  function closeAlert(element) {
    const alertModal = element.closest(".custom-alert");
    alertModal.classList.remove('show');
    document.body.style.overflow = 'auto';
    if (alertCallback) {
      var cb = alertCallback;
      alertCallback = null;
      cb();
    }
  }

  // Custom close Confirm function

  function closeConfirm(result) {
    const confirmModal = document.getElementById('customConfirm');
    confirmModal.classList.remove('show');
    document.body.style.overflow = 'auto';

    if (confirmCallback) {
      confirmCallback(result);
      confirmCallback = null;
    }
  }
/**
 * Show confirmation dialog with callback
 *
 * @param {string} message - Confirmation message to display
 * @param {function} callback - Callback function that receives boolean (confirmed)
 * @returns {boolean} - Always returns false to prevent default anchor behavior
 */
  function showConfirm(message, callback) {
    const confirmModal = document.getElementById('customConfirm');
    const confirmMessage = document.getElementById('confirmMessage');

    confirmMessage.textContent = message;
    confirmCallback = callback;

    confirmModal.classList.add('show');
    document.body.style.overflow = 'hidden';
  }


  function goBack() {
    showConfirm('Are you sure you want to go back? Any unsaved changes will be lost.', function(result) {
      if (result) {
        window.history.back();
      }
    });
  }

  // Click outside to close any custom alert modal
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('custom-alert')) {
      const alertModal = e.target;
      
      // Handle customConfirm specially (has callback)
      if (alertModal.id === 'customConfirm') {
        closeConfirm(false);
      } else {
        // Handle all other custom alert modals
        alertModal.classList.remove('show');
        document.body.style.overflow = 'auto';
        if (alertCallback) {
          var cb = alertCallback;
          alertCallback = null;
          cb();
        }
      }
    }
  });
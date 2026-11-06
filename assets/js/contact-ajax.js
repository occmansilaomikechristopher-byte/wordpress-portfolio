/**
 * Quadro Theme - AJAX Contact Form Handler
 */
document.addEventListener('DOMContentLoaded', function () {
  const contactForm = document.getElementById('quadro-contact-form');
  const alertContainer = document.getElementById('quadro-form-alert');
  const submitBtn = document.getElementById('quadro-submit-btn');

  if (!contactForm) return;

  contactForm.addEventListener('submit', function (e) {
    e.preventDefault();

    // Reset alert
    alertContainer.className = 'form-alert';
    alertContainer.style.display = 'none';
    alertContainer.textContent = '';

    // Collect values
    const name = document.getElementById('contact_name').value.trim();
    const email = document.getElementById('contact_email').value.trim();
    const subject = document.getElementById('contact_subject').value.trim();
    const message = document.getElementById('contact_message').value.trim();
    const recipient = document.getElementById('contact_recipient') ? document.getElementById('contact_recipient').value : 'all';

    // Simple client-side validation
    if (!name || !email || !message) {
      showAlert('error', 'Please fill in all required fields (Name, Email, Message).');
      return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      showAlert('error', 'Please enter a valid email address.');
      return;
    }

    // Set button loading state
    const originalBtnText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="status-dot"></span> Sending message...';

    // Prepare form data
    const formData = new FormData();
    formData.append('action', 'quadro_submit_contact');
    formData.append('security', quadro_data.nonce);
    formData.append('name', name);
    formData.append('email', email);
    formData.append('subject', subject);
    formData.append('message', message);
    formData.append('member_recipient', recipient);

    fetch(quadro_data.ajax_url, {
      method: 'POST',
      body: formData
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;

        if (data.success) {
          showAlert('success', data.data.message || 'Thank you! Your message has been sent successfully. We will be in touch shortly.');
          contactForm.reset();
        } else {
          showAlert('error', data.data.message || 'An error occurred while sending your message. Please try again.');
        }
      })
      .catch(function (error) {
        console.error('Submission error:', error);
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
        showAlert('error', 'Network error encountered. Please check your connection or contact us directly via email.');
      });
  });

  function showAlert(type, message) {
    alertContainer.className = 'form-alert ' + type;
    alertContainer.textContent = message;
    alertContainer.style.display = 'block';
    alertContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }
});


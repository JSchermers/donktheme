document.addEventListener('DOMContentLoaded', function () {

  let currentStep = 1;

  function showStep(step) {
    document.querySelectorAll('.cf7-step').forEach(el => el.classList.remove('active'));
    document.querySelector('.step-' + step).classList.add('active');

    // scroll to top bij elke stap
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  function validateStep(stepEl) {
    let valid = true;

    // verplichte velden binnen huidige stap
    stepEl.querySelectorAll('[aria-required="true"], input[required], select[required], textarea[required]').forEach(field => {
      if (!field.value || field.value.trim() === '') {
        field.classList.add('cf7-error');
        valid = false;
      } else {
        field.classList.remove('cf7-error');
      }
    });

    // CF7 native required check (belangrijk!)
    stepEl.querySelectorAll('input, select, textarea').forEach(el => {
      if (el.classList.contains('wpcf7-not-valid')) {
        valid = false;
      }
    });

    return valid;
  }

  document.querySelectorAll('.next').forEach(btn => {
    btn.addEventListener('click', () => {
      const currentEl = document.querySelector('.step-' + currentStep);

      if (!validateStep(currentEl)) {
        alert('Vul alle verplichte velden in deze stap in.');
        return;
      }

      currentStep++;
      showStep(currentStep);
    });
  });

  document.querySelectorAll('.prev').forEach(btn => {
    btn.addEventListener('click', () => {
      currentStep--;
      showStep(currentStep);
    });
  });

});

// =========== BEDANKT PAGINA ==================

document.addEventListener('wpcf7mailsent', function(event) {
  window.location.href = "/bedankt-aanmelding/";
}, false);

// ========= YOUR SUBJECT AANPASSEN ===============

document.addEventListener('DOMContentLoaded', function () {

  function updateSubject() {
    const roepnaam = document.querySelector('input[name="text-roepnaam"]')?.value || '';
    const achternaam = document.querySelector('input[name="your-name"]')?.value || '';

    const subjectField = document.querySelector('input[name="your-subject"]');

    if (subjectField) {
      subjectField.value = `Aanmelding - ${roepnaam} ${achternaam}`;
    }
  }

  document.querySelectorAll('input').forEach(el => {
    el.addEventListener('input', updateSubject);
  });

});

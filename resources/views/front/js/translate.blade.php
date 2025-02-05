<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'ar,en', // Only Arabic (ar) and English (en)
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
  }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
<script>
  const translations = {
    ar: { // Arabic Translations
      "Select Nationality": "اختر الجنسية",
      "Libyan": "ليبي",
      "Non-Libyan": "غير ليبي",
      "Select Highest Qualification": "حدد أعلى مؤهل",
      "Select Interested University": "اختر الجامعة المهتمة",
      "Select Interested Course": "اختر الدورة المهتمة"
    },
    en: { // English (Default)
      "Select Nationality": "Select Nationality",
      "Libyan": "Libyan",
      "Non-Libyan": "Non-Libyan",
      "Select Highest Qualification": "Select Highest Qualification",
      "Select Interested University": "Select Interested University",
      "Select Interested Course": "Select Interested Course"
    }
  };


  // Function to translate dropdown options
  function translateDropdown(lang) {
    document.querySelectorAll("select option").forEach(option => {
      const originalText = option.getAttribute("data-original-text"); // Store original text
      if (!originalText) {
        option.setAttribute("data-original-text", option.textContent.trim()); // Store the default text
      }
      const translatedText = translations[lang]?.[originalText];
      option.textContent = translatedText || originalText; // Use translation or fallback to original
    });
  }


  // Detect language change from Google Translate
  function detectLanguageChange() {
    const observer = new MutationObserver(() => {
      const lang = document.documentElement.lang || document.querySelector("html").getAttribute("lang");

      if (lang.startsWith("ar")) {
        translateDropdown("ar");
      } else {
        translateDropdown("en");
      }
    });

    observer.observe(document.body, {
      childList: true,
      subtree: true
    });
  }

  // Run the function when page loads
  document.addEventListener("DOMContentLoaded", detectLanguageChange);
</script>

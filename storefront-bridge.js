document.addEventListener("DOMContentLoaded", () => {
  applyRuntimeLanguage();

  document.querySelectorAll("[data-lang-option]").forEach((button) => {
    button.addEventListener("click", () => {
      window.setTimeout(applyRuntimeLanguage, 0);
    });
  });
});

function applyRuntimeLanguage() {
  const language = document.documentElement.lang === "ar" ? "ar" : "en";

  document.querySelectorAll("[data-lang-en]").forEach((element) => {
    const value = element.dataset[language === "ar" ? "langAr" : "langEn"];
    if (typeof value === "string") {
      element.textContent = value;
    }
  });

  document.querySelectorAll("[data-placeholder-en]").forEach((element) => {
    const value = element.dataset[language === "ar" ? "placeholderAr" : "placeholderEn"];
    if (typeof value === "string") {
      element.setAttribute("placeholder", value);
    }
  });

  document.querySelectorAll("[data-alt-en]").forEach((element) => {
    const value = element.dataset[language === "ar" ? "altAr" : "altEn"];
    if (typeof value === "string") {
      element.setAttribute("alt", value);
    }
  });

  document.querySelectorAll("[data-aria-label-en]").forEach((element) => {
    const value = element.dataset[language === "ar" ? "ariaLabelAr" : "ariaLabelEn"];
    if (typeof value === "string") {
      element.setAttribute("aria-label", value);
    }
  });

  const footerCopy = document.querySelector("[data-footer-copy]");
  if (footerCopy) {
    const year = new Date().getFullYear();
    footerCopy.textContent = language === "ar"
      ? `© ${year} Mood. واجهة متجر فاخرة ثنائية اللغة مبنية بـ HTML وCSS وJavaScript وPHP وMySQL.`
      : `© ${year} Mood. Luxury bilingual storefront built with HTML, CSS, JavaScript, PHP, and MySQL.`;
  }
}

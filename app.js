document.addEventListener("DOMContentLoaded", () => {
  initializeMobileNav();
  initializeGallery();
  initializeImagePreview();
  initializeAdminLanguage();
});

function initializeMobileNav() {
  const toggle = document.querySelector("[data-nav-toggle]");
  const panel = document.querySelector("[data-nav-panel]");
  const overlay = document.querySelector("[data-nav-overlay]");

  if (!toggle || !panel || !overlay) {
    return;
  }

  const closeNav = () => {
    document.body.classList.remove("nav-open");
    toggle.setAttribute("aria-expanded", "false");
  };

  toggle.addEventListener("click", () => {
    const isOpen = document.body.classList.toggle("nav-open");
    toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
  });

  overlay.addEventListener("click", closeNav);

  panel.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      if (window.innerWidth <= 900) {
        closeNav();
      }
    });
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      closeNav();
    }
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth > 900) {
      closeNav();
    }
  });
}

function initializeGallery() {
  const gallery = document.querySelector("[data-gallery]");
  if (!gallery) {
    return;
  }

  const mainImage = gallery.querySelector("[data-gallery-main]");
  const thumbs = Array.from(gallery.querySelectorAll("[data-gallery-thumb]"));
  const previous = gallery.querySelector("[data-gallery-prev]");
  const next = gallery.querySelector("[data-gallery-next]");

  if (!mainImage || thumbs.length === 0) {
    return;
  }

  let currentIndex = thumbs.findIndex((thumb) => thumb.classList.contains("is-active"));
  if (currentIndex < 0) {
    currentIndex = 0;
  }

  const updateGallery = (index) => {
    const thumb = thumbs[index];
    if (!thumb) {
      return;
    }

    currentIndex = index;
    mainImage.src = thumb.dataset.imageSrc || mainImage.src;
    mainImage.alt = thumb.dataset.imageAlt || mainImage.alt;

    thumbs.forEach((item, itemIndex) => {
      item.classList.toggle("is-active", itemIndex === currentIndex);
    });
  };

  thumbs.forEach((thumb, index) => {
    thumb.addEventListener("click", () => updateGallery(index));
  });

  previous?.addEventListener("click", () => {
    updateGallery((currentIndex - 1 + thumbs.length) % thumbs.length);
  });

  next?.addEventListener("click", () => {
    updateGallery((currentIndex + 1) % thumbs.length);
  });
}

function initializeImagePreview() {
  const input = document.querySelector("[data-image-input]");
  const preview = document.querySelector("[data-image-preview]");

  if (!input || !preview) {
    return;
  }

  input.addEventListener("change", () => {
    preview.innerHTML = "";
    const files = Array.from(input.files || []);

    files.forEach((file) => {
      if (!file.type.startsWith("image/")) {
        return;
      }

      const reader = new FileReader();
      reader.onload = (event) => {
        const item = document.createElement("figure");
        item.className = "preview-card";
        item.innerHTML = `<img src="${event.target?.result || ""}" alt="${file.name}"><figcaption>${file.name}</figcaption>`;
        preview.appendChild(item);
      };
      reader.readAsDataURL(file);
    });
  });
}

function initializeAdminLanguage() {
  const controls = Array.from(document.querySelectorAll("[data-admin-lang-option]"));

  if (controls.length === 0) {
    return;
  }

  const storageKey = "mood-admin-language";
  const translations = {
    "Admin Dashboard": "لوحة التحكم",
    "Overview": "نظرة عامة",
    "Sections": "الأقسام",
    "Products": "المنتجات",
    "Storefront": "واجهة المتجر",
    "Logout": "تسجيل الخروج",
    "Dashboard": "لوحة التحكم",
    "Control the storefront from one place.": "تحكم في واجهة المتجر من مكان واحد.",
    "Create sections, manage products, upload images, and keep the storefront updated without editing templates manually.": "أنشئ الأقسام وأدر المنتجات وارفع الصور وحافظ على تحديث المتجر بدون تعديل القوالب يدويًا.",
    "Uploaded images": "الصور المرفوعة",
    "Recent Sections": "أحدث الأقسام",
    "Add Section": "إضافة قسم",
    "No sections have been created yet.": "لم يتم إنشاء أي أقسام بعد.",
    "products": "منتجات",
    "Latest Products": "أحدث المنتجات",
    "Add Product": "إضافة منتج",
    "No products have been created yet.": "لم يتم إنشاء أي منتجات بعد.",
    "Manage every storefront section.": "إدارة جميع أقسام المتجر.",
    "Sections control how products are organized on the customer website. Deleting a section also removes its related products and images.": "تتحكم الأقسام في طريقة تنظيم المنتجات داخل موقع العملاء. حذف القسم يؤدي أيضًا إلى حذف المنتجات والصور المرتبطة به.",
    "Search sections": "البحث في الأقسام",
    "Search": "بحث",
    "Reset": "إعادة ضبط",
    "No sections found.": "لم يتم العثور على أقسام.",
    "Create a section or change the search criteria.": "أنشئ قسمًا جديدًا أو غيّر معايير البحث.",
    "Name": "الاسم",
    "Slug": "الرابط المختصر",
    "Sort": "الترتيب",
    "Actions": "الإجراءات",
    "Edit": "تعديل",
    "Delete": "حذف",
    "Edit Section": "تعديل قسم",
    "New Section": "قسم جديد",
    "Update section details.": "تحديث بيانات القسم.",
    "Create a new storefront section.": "إنشاء قسم جديد للمتجر.",
    "Sections help group products cleanly on the customer website and inside the dashboard filters.": "تساعد الأقسام على تنظيم المنتجات بشكل واضح داخل موقع العملاء ومرشحات لوحة التحكم.",
    "Section Name": "اسم القسم",
    "Description": "الوصف",
    "Sort Order": "ترتيب العرض",
    "Save Changes": "حفظ التغييرات",
    "Create Section": "إنشاء القسم",
    "Cancel": "إلغاء",
    "Manage every product, image, and price.": "إدارة جميع المنتجات والصور والأسعار.",
    "Search by product details, filter by section, edit galleries, and keep storefront information synchronized from one admin table.": "ابحث عبر تفاصيل المنتج وصفِّ حسب القسم وعدّل المعرض وحافظ على مزامنة بيانات المتجر من جدول إدارة واحد.",
    "Search products": "البحث في المنتجات",
    "Section": "القسم",
    "All sections": "كل الأقسام",
    "No products found.": "لم يتم العثور على منتجات.",
    "Add a product or change the search and section filters.": "أضف منتجًا أو غيّر البحث ومرشح القسم.",
    "Product": "المنتج",
    "Price": "السعر",
    "Images": "الصور",
    "Updated": "آخر تحديث",
    "View": "عرض",
    "Slug:": "الرابط المختصر:",
    "Edit Product": "تعديل منتج",
    "New Product": "منتج جديد",
    "Refine product details and gallery.": "تحديث تفاصيل المنتج والمعرض.",
    "Create a new catalog product.": "إنشاء منتج جديد في الكتالوج.",
    "Each product stores its section, multiple images, attributes, description, and price for the customer detail page.": "يحفظ كل منتج قسمه وصوره المتعددة وخصائصه ووصفه وسعره ليظهر بشكل كامل في صفحة تفاصيل المنتج.",
    "Product Name": "اسم المنتج",
    "Attributes": "الخصائص",
    "Product Images": "صور المنتج",
    "Example: 250g pack, Natural leaf blend, Luxury charcoal-ready mix.": "مثال: عبوة 250 غرام، خلطة أوراق طبيعية، مزيج فاخر مناسب للفحم.",
    "Upload JPG, PNG, WEBP, or GIF images. You can add multiple images and arrange existing ones below.": "ارفع صور JPG أو PNG أو WEBP أو GIF. يمكنك إضافة عدة صور وترتيب الصور الحالية في الأسفل.",
    "Existing Images": "الصور الحالية",
    "Change sort order to control the carousel sequence, or mark images to remove them on save.": "غيّر ترتيب الصور للتحكم في تسلسل المعرض، أو حدّد الصور التي تريد حذفها عند الحفظ.",
    "Remove this image": "حذف هذه الصورة",
    "Create Product": "إنشاء المنتج",
    "View Storefront Page": "عرض صفحة المنتج",
    "Admin Access": "دخول الإدارة",
    "Dashboard Login": "تسجيل دخول لوحة التحكم",
    "Use the credentials requested for this project to manage sections, products, prices, descriptions, and product galleries.": "استخدم بيانات الدخول الخاصة بالمشروع لإدارة الأقسام والمنتجات والأسعار والأوصاف ومعرض صور المنتجات.",
    "Username": "اسم المستخدم",
    "Password": "كلمة المرور",
    "Login": "تسجيل الدخول",
    "Back to Storefront": "العودة إلى المتجر",
    "Manage sections, products, pricing, and images with the same luxury visual system used on the customer website.": "إدارة الأقسام والمنتجات والأسعار والصور بنفس الهوية الفاخرة المستخدمة في واجهة المتجر."
  };
  const placeholderTranslations = {
    "Search by section name or description": "ابحث باسم القسم أو وصفه",
    "Leave blank to generate automatically": "اتركه فارغًا ليتم إنشاؤه تلقائيًا",
    "Search by product name, section, attributes, or description": "ابحث باسم المنتج أو القسم أو الخصائص أو الوصف",
    "Add one attribute per line": "أضف كل خاصية في سطر مستقل"
  };

  const applyLanguage = (lang) => {
    const safeLang = lang === "ar" ? "ar" : "en";
    document.documentElement.lang = safeLang;
    document.documentElement.dir = safeLang === "ar" ? "rtl" : "ltr";
    localStorage.setItem(storageKey, safeLang);

    controls.forEach((control) => {
      const isActive = control.dataset.adminLangOption === safeLang;
      control.classList.toggle("is-active", isActive);
      control.setAttribute("aria-pressed", isActive ? "true" : "false");
    });

    document.querySelectorAll("[data-admin-lang-en]").forEach((element) => {
      const englishValue = element.getAttribute("data-admin-lang-en") || "";
      const value = safeLang === "ar"
        ? (translations[englishValue] || element.getAttribute("data-admin-lang-ar") || englishValue)
        : englishValue;
      if (value !== null) {
        element.textContent = value;
      }
    });

    document.querySelectorAll("[data-admin-placeholder-en]").forEach((element) => {
      const englishValue = element.getAttribute("data-admin-placeholder-en") || "";
      const value = safeLang === "ar"
        ? (placeholderTranslations[englishValue] || element.getAttribute("data-admin-placeholder-ar") || englishValue)
        : englishValue;
      if (value !== null) {
        element.setAttribute("placeholder", value);
      }
    });
  };

  controls.forEach((control) => {
    control.addEventListener("click", () => {
      applyLanguage(control.dataset.adminLangOption || "en");
    });
  });

  applyLanguage(localStorage.getItem(storageKey) || "en");
}

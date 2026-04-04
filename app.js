document.addEventListener("DOMContentLoaded", () => {
  initializeMobileNav();
  initializeGallery();
  initializeImagePreview();
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

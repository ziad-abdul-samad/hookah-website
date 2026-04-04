const STORAGE_KEY = "aurum-leaf-language";

const translations = {
  en: {
    meta: {
      home: "Aurum Leaf | Luxury Tobacco & Accessories",
      products: "Aurum Leaf | Product Collection",
      about: "Aurum Leaf | About Us",
      productDetail: "Aurum Leaf | Product Details"
    },
    nav: {
      brandTagline: "Fine Tobacco Atelier",
      home: "Home",
      products: "Products",
      about: "About Us",
      menuLabel: "Open menu",
      closeLabel: "Close menu"
    },
    home: {
      hero: {
        eyebrow: "Curated Lounge Excellence",
        title: "A refined tobacco destination shaped with gold-standard detail.",
        text: "Discover premium tobacco blends, clean-burning coal, and presentation-grade accessories arranged in a modern boutique experience for retailers, lounges, and connoisseurs.",
        primaryCta: "Explore Products",
        secondaryCta: "Discover Our Story",
        noteLabel: "Signature Promise",
        noteText: "Hand-selected tobacco, balanced heat control, and polished accessories that elevate every shelf and session.",
        stats: {
          yearsLabel: "Years of refined sourcing",
          categoriesLabel: "Signature product categories",
          qualityLabel: "Curated for premium shelves"
        }
      },
      images: {
        heroMainAlt: "Elegant premium lounge interior",
        heroSideAlt: "Luxury hookah product display",
        heroAccentAlt: "Preparing premium tobacco",
        categoryOneAlt: "Premium tobacco bowl preparation",
        categoryTwoAlt: "Glowing premium charcoal cubes",
        categoryThreeAlt: "Luxury smoking accessories",
        experienceAlt: "Preparing refined tobacco by hand",
        panelAlt: "Modern premium lounge"
      },
      categories: {
        eyebrow: "Core Collections",
        title: "Designed for a premium retail presence and a memorable lounge experience.",
        text: "Each category is presented with a clean, editorial layout so you can expand the catalog later without disturbing the luxury feel.",
        card1: {
          title: "Reserve Tobacco Blends",
          text: "Layered aroma profiles, smooth molasses texture, and shelf-ready presentation for boutiques and lounges.",
          meta: "Balanced flavor depth"
        },
        card2: {
          title: "Natural Coconut Coal",
          text: "Consistent ignition, stable temperature, and an elegant burn profile that complements high-end tobacco service.",
          meta: "Clean and even heat"
        },
        card3: {
          title: "Smoking Accessories",
          text: "Statement hookahs, bowls, tongs, and display pieces selected to complete a polished luxury setup.",
          meta: "Retail and lounge ready"
        }
      },
      experience: {
        badge: "Every arrival is visually checked and batch reviewed.",
        eyebrow: "Luxury By Design",
        title: "A boutique presentation system built for elegant storefronts and modern hospitality.",
        text: "From product selection to visual merchandising, the experience is composed to feel calm, upscale, and intentionally premium in both Arabic and English.",
        point1: {
          title: "Trusted Quality Control",
          text: "Refined display standards, tidy packaging hierarchy, and a clean brand impression at every touchpoint."
        },
        point2: {
          title: "Editorial Product Styling",
          text: "Images, cards, and spacing are arranged to feel premium while staying easy to edit manually later."
        },
        point3: {
          title: "Bilingual Luxury Flow",
          text: "The layout flips cleanly between LTR and RTL so the Arabic version feels native, not forced."
        }
      },
      showcase: {
        eyebrow: "Premium Highlights",
        title: "Elegant details that make the whole site feel curated rather than generic.",
        text: "Subtle motion, layered surfaces, and luxury accents work together to create a polished browsing experience.",
        card1: {
          title: "Signature Presentation",
          text: "Golden accents, serif headlines, and restrained motion for a refined first impression."
        },
        card2: {
          title: "Smooth Animation Rhythm",
          text: "Fade-ins, hover lift, and button transitions keep the interface alive without becoming noisy."
        },
        card3: {
          title: "Easy Manual Expansion",
          text: "The same clean structures can be duplicated quickly when you add more products later."
        },
        panel: {
          eyebrow: "Curated Atmosphere",
          title: "Built to feel like a premium showroom, not a basic catalog.",
          text: "Use the Products page as your editable inventory board, then use the Home and About pages to reinforce brand confidence with elegant storytelling.",
          cta: "Open Product Catalog"
        }
      },
      cta: {
        eyebrow: "Ready To Expand",
        title: "A polished static website that is simple to edit and strong enough to present immediately.",
        text: "Everything is written in plain HTML, CSS, and JavaScript, so you can open the files directly in the browser and update the content manually whenever you need.",
        primary: "Browse Products",
        secondary: "Read About Us"
      }
    },
    products: {
      hero: {
        eyebrow: "Refined Inventory",
        title: "A clean, bilingual product page built to be easy for you to expand later.",
        text: "Search, type filtering, and weight filtering are already wired in with vanilla JavaScript. Each card below is one sample product per type so you can duplicate the structure manually."
      },
      ribbon1: "Search enabled",
      ribbon2: "Bilingual data",
      ribbon3: "Easy to duplicate",
      filters: {
        searchLabel: "Search products",
        searchPlaceholder: "Search by title or description",
        typeLabel: "Filter by type",
        weightLabel: "Filter by weight",
        allTypes: "All types",
        allWeights: "All weights",
        helper: "The cards are intentionally simple and elegant so you can copy one block and add more later."
      },
      emptyTitle: "No products match these filters.",
      emptyText: "Try clearing the search box or choose a different type or weight.",
      countLabel: (count) => `${count} sample ${count === 1 ? "product" : "products"}`,
      detailCta: "View Details",
      labels: {
        type: "Type",
        weight: "Weight"
      }
    },
    about: {
      hero: {
        eyebrow: "About Aurum Leaf",
        title: "A polished brand story presented with elegant structure and visual confidence.",
        text: "This page is designed to explain your company clearly, showcase your standards, and support both English and Arabic audiences with a premium bilingual layout."
      },
      banner: {
        eyebrow: "Regional Reach",
        title: "A luxury distribution story with craftsmanship at the center.",
        text: "The wide map-style banner gives this page a distinguished opening while suggesting sourcing networks, hospitality supply, and elevated brand movement.",
        tag1: "Damascus Atelier",
        tag2: "Premium Retail Partners",
        tag3: "Hospitality Supply Route"
      },
      cards: {
        card1: {
          title: "Heritage Quality",
          text: "We position the brand as careful, detail-driven, and selective about every product introduced to the shelf."
        },
        card2: {
          title: "Elegant Store Presence",
          text: "Our presentation standard is built for premium counters, curated displays, and a visually balanced customer experience."
        },
        card3: {
          title: "Regional Distribution",
          text: "The structure suggests organized supply routes for tobacco, coal, and accessories across multiple client channels."
        },
        card4: {
          title: "Client Partnership",
          text: "The tone supports long-term retail and hospitality relationships built around consistency, presentation, and trust."
        }
      },
      story: {
        eyebrow: "Brand Character",
        title: "Structured storytelling that feels premium in both languages.",
        text: "The About page is arranged to feel calm, valuable, and trustworthy. It balances visual sophistication with clear information so the brand feels established from the first screen.",
        point1: "Use this section to describe sourcing philosophy, product discipline, or market vision.",
        point2: "Swap in real company details later without changing the page structure or styling system.",
        point3: "RTL and LTR support are already handled, so both language versions stay elegant and readable.",
        quote: "Refined presentation builds confidence before the first product is even touched."
      },
      images: {
        storyAlt: "Premium lounge environment"
      }
    },
    detail: {
      hero: {
        eyebrow: "Product Details",
        title: "Premium product presentation with a responsive image carousel and bilingual details.",
        text: "This page is connected directly to the shared product data, so each product can have its own images, description, and highlights without any backend."
      },
      back: "Back to Products",
      overviewTitle: "Product Overview",
      highlightsTitle: "Highlights",
      notFoundTitle: "Product not found",
      notFoundText: "This product link does not match any current item in the product data array.",
      notFoundAction: "Return to Products",
      previousLabel: "Previous image",
      nextLabel: "Next image"
    },
    footer: {
      description: "A bilingual luxury storefront for refined tobacco, natural coal, and premium smoking accessories.",
      linksTitle: "Quick Links",
      promiseTitle: "Premium Promise",
      promiseText: "Light backgrounds, black and gold accents, rich imagery, and bilingual polish combine to create a modern luxury identity.",
      copy: (year) => `© ${year} Aurum Leaf. Static bilingual website built with HTML, CSS, and vanilla JavaScript.`
    }
  },
  ar: {
    meta: {
      home: "Aurum Leaf | تبغ فاخر وإكسسوارات تدخين",
      products: "Aurum Leaf | مجموعة المنتجات",
      about: "Aurum Leaf | من نحن",
      productDetail: "Aurum Leaf | تفاصيل المنتج"
    },
    nav: {
      brandTagline: "دار التبغ الفاخر",
      home: "الرئيسية",
      products: "المنتجات",
      about: "من نحن",
      menuLabel: "فتح القائمة",
      closeLabel: "إغلاق القائمة"
    },
    home: {
      hero: {
        eyebrow: "تجربة صالة راقية",
        title: "وجهة تبغ فاخرة صُممت بعناية تليق بالتفاصيل الذهبية.",
        text: "اكتشف خلطات تبغ مميزة، وفحمًا نظيف الاحتراق، وإكسسوارات تدخين عالية العرض ضمن تجربة بوتيك حديثة تناسب المتاجر الراقية والصالات والعملاء الباحثين عن الجودة.",
        primaryCta: "استعرض المنتجات",
        secondaryCta: "اكتشف قصتنا",
        noteLabel: "وعدنا المميز",
        noteText: "تبغ منتقى بعناية، وتحكم متوازن في الحرارة، وإكسسوارات مصقولة ترتقي بكل رف وكل جلسة.",
        stats: {
          yearsLabel: "سنة من التوريد الراقي",
          categoriesLabel: "فئات منتجات مميزة",
          qualityLabel: "مختار للعرض الفاخر"
        }
      },
      images: {
        heroMainAlt: "مساحة صالة فاخرة وأنيقة",
        heroSideAlt: "عرض منتج شيشة فاخر",
        heroAccentAlt: "تحضير تبغ فاخر",
        categoryOneAlt: "تحضير رأس تبغ فاخر",
        categoryTwoAlt: "مكعبات فحم متوهجة عالية الجودة",
        categoryThreeAlt: "إكسسوارات تدخين فاخرة",
        experienceAlt: "تحضير تبغ فاخر يدويًا",
        panelAlt: "صالة عصرية فاخرة"
      },
      categories: {
        eyebrow: "المجموعات الأساسية",
        title: "مصمم ليمنح حضورًا راقيًا في المتجر وتجربة مميزة في الصالة.",
        text: "كل فئة معروضة بتنسيق تحريري نظيف حتى تتمكن من توسيع الكتالوج لاحقًا من دون أن تفقد الهوية الفاخرة للموقع.",
        card1: {
          title: "خلطات تبغ فاخرة",
          text: "طبقات نكهة غنية وقوام معسل ناعم وعرض جاهز للأرفف يناسب البوتيكات والصالات الراقية.",
          meta: "عمق نكهة متوازن"
        },
        card2: {
          title: "فحم جوز الهند الطبيعي",
          text: "اشتعال ثابت وحرارة مستقرة وأداء احتراق أنيق يكمل تقديم التبغ الفاخر.",
          meta: "حرارة نظيفة ومتوازنة"
        },
        card3: {
          title: "إكسسوارات التدخين",
          text: "شيش مميزة، ورؤوس، وملاقط، وقطع عرض مختارة بعناية لإكمال إعداد فاخر ومتكامل.",
          meta: "جاهز للمتجر والصالة"
        }
      },
      experience: {
        badge: "كل شحنة تُراجع بصريًا ويُفحص مستوى الدفعة بعناية.",
        eyebrow: "فخامة مدروسة",
        title: "نظام عرض بوتيكي صُمم لواجهات أنيقة وقطاع ضيافة حديث.",
        text: "من اختيار المنتج إلى تنسيق العرض البصري، تم بناء التجربة لتبدو هادئة وراقية ومتعمدة الفخامة باللغتين العربية والإنجليزية.",
        point1: {
          title: "ضبط جودة موثوق",
          text: "معايير عرض راقية، وتسلسل تعبئة أنيق، وانطباع بصري نظيف في كل نقطة تواصل."
        },
        point2: {
          title: "تنسيق بصري تحريري",
          text: "الصور والبطاقات والمسافات مرتبة لتبدو فاخرة مع بقائها سهلة التعديل اليدوي لاحقًا."
        },
        point3: {
          title: "تجربة ثنائية اللغة",
          text: "يتحول التصميم بسلاسة بين LTR وRTL ليشعر الإصدار العربي بأنه أصيل وليس مجرد ترجمة."
        }
      },
      showcase: {
        eyebrow: "لمسات مميزة",
        title: "تفاصيل أنيقة تجعل الموقع يبدو منسقًا بعناية وليس قالبًا عامًا.",
        text: "الحركة الهادئة والأسطح المتدرجة واللمسات الذهبية تتعاون لتقديم تجربة تصفح مصقولة.",
        card1: {
          title: "عرض يحمل التوقيع",
          text: "لمسات ذهبية وعناوين سيريف وحركة محسوبة تمنح انطباعًا أول راقيًا."
        },
        card2: {
          title: "إيقاع حركي ناعم",
          text: "ظهور تدريجي وتأثيرات hover وانتقالات أزرار تحافظ على الحيوية من دون إزعاج بصري."
        },
        card3: {
          title: "سهولة التوسعة اليدوية",
          text: "يمكن نسخ نفس البنية النظيفة بسرعة عند إضافة منتجات جديدة لاحقًا."
        },
        panel: {
          eyebrow: "أجواء منسقة",
          title: "صُمم ليشبه صالة عرض فاخرة لا مجرد كتالوج بسيط.",
          text: "استخدم صفحة المنتجات كلوحة مخزون قابلة للتعديل، ثم دع صفحتي الرئيسية ومن نحن تعززان ثقة العلامة بسرد بصري أنيق.",
          cta: "افتح كتالوج المنتجات"
        }
      },
      cta: {
        eyebrow: "جاهز للتوسعة",
        title: "موقع ثابت مصقول، سهل التعديل، وقوي بما يكفي للعرض مباشرة.",
        text: "كل شيء مكتوب بـ HTML وCSS وJavaScript فقط، لذلك يمكنك فتح الملفات مباشرة في المتصفح وتعديل المحتوى يدويًا في أي وقت.",
        primary: "تصفح المنتجات",
        secondary: "اقرأ من نحن"
      }
    },
    products: {
      hero: {
        eyebrow: "مخزون راقٍ",
        title: "صفحة منتجات ثنائية اللغة ونظيفة، سهلة التوسعة لاحقًا.",
        text: "تم تجهيز البحث والتصفية حسب النوع والوزن باستخدام JavaScript فقط. كل بطاقة بالأسفل تمثل نموذجًا واحدًا لكل نوع منتج حتى تتمكن من تكرار البنية يدويًا لاحقًا."
      },
      ribbon1: "بحث جاهز",
      ribbon2: "بيانات ثنائية اللغة",
      ribbon3: "سهل النسخ",
      filters: {
        searchLabel: "ابحث في المنتجات",
        searchPlaceholder: "ابحث بالاسم أو الوصف",
        typeLabel: "تصفية حسب النوع",
        weightLabel: "تصفية حسب الوزن",
        allTypes: "كل الأنواع",
        allWeights: "كل الأوزان",
        helper: "البطاقات مقصودة أن تكون بسيطة وأنيقة حتى تتمكن من نسخ بطاقة واحدة وإضافة المزيد لاحقًا."
      },
      emptyTitle: "لا توجد منتجات تطابق هذه التصفية.",
      emptyText: "جرّب مسح البحث أو اختيار نوع أو وزن مختلف.",
      countLabel: (count) => `${count} ${count === 1 ? "نموذج منتج" : "نماذج منتجات"}`,
      detailCta: "عرض التفاصيل",
      labels: {
        type: "النوع",
        weight: "الوزن"
      }
    },
    about: {
      hero: {
        eyebrow: "عن Aurum Leaf",
        title: "قصة علامة تجارية مصقولة بتنسيق أنيق وحضور بصري واثق.",
        text: "تم تصميم هذه الصفحة لتشرح الشركة بوضوح، وتعرض معاييرها، وتخاطب الجمهور العربي والإنجليزي بتجربة ثنائية اللغة راقية."
      },
      banner: {
        eyebrow: "امتداد إقليمي",
        title: "حكاية توزيع فاخرة تتمحور حول الحرفية.",
        text: "يمنح هذا البانر العريض بطابع الخريطة بداية مميزة للصفحة، ويعكس شبكات التوريد وتوزيع الضيافة وحركة العلامة بأسلوب راقٍ.",
        tag1: "ورشة دمشق",
        tag2: "شركاء البيع الفاخر",
        tag3: "مسار توريد الضيافة"
      },
      cards: {
        card1: {
          title: "جودة ذات إرث",
          text: "نقدم العلامة على أنها دقيقة، وانتقائية، وتهتم بالتفاصيل في كل منتج يصل إلى الرف."
        },
        card2: {
          title: "حضور متجر أنيق",
          text: "معيار العرض لدينا مهيأ للكاونترات الراقية والعرض المنسق وتجربة عميل متوازنة بصريًا."
        },
        card3: {
          title: "توزيع إقليمي منظم",
          text: "يوحي الهيكل بوجود مسارات توريد منظمة للتبغ والفحم والإكسسوارات عبر قنوات عملاء متعددة."
        },
        card4: {
          title: "شراكة مع العملاء",
          text: "يدعم أسلوب الصفحة علاقات طويلة الأمد مع المتاجر وقطاع الضيافة مبنية على الثبات والثقة وحسن التقديم."
        }
      },
      story: {
        eyebrow: "شخصية العلامة",
        title: "سرد منظم يشعر بالفخامة في اللغتين.",
        text: "تم ترتيب صفحة من نحن لتبدو هادئة وقيّمة وجديرة بالثقة. فهي توازن بين الرقي البصري ووضوح المعلومات حتى تبدو العلامة راسخة من أول شاشة.",
        point1: "استخدم هذا القسم لوصف فلسفة التوريد أو الانضباط في المنتج أو رؤية السوق.",
        point2: "يمكنك استبدال التفاصيل الحالية بمعلومات شركتك الحقيقية لاحقًا من دون تغيير بنية الصفحة أو نظام التصميم.",
        point3: "دعم RTL وLTR جاهز مسبقًا، لذلك سيبقى كلا الإصدارين أنيقًا وسهل القراءة.",
        quote: "العرض الراقي يبني الثقة قبل أن يلمس العميل المنتج الأول."
      },
      images: {
        storyAlt: "بيئة صالة فاخرة"
      }
    },
    detail: {
      hero: {
        eyebrow: "تفاصيل المنتج",
        title: "عرض فاخر للمنتج مع معرض صور متجاوب وتفاصيل ثنائية اللغة.",
        text: "هذه الصفحة متصلة مباشرة ببيانات المنتجات المشتركة، لذلك يمكن لكل منتج أن يملك صوره ووصفه ونقاطه الخاصة من دون أي backend."
      },
      back: "العودة إلى المنتجات",
      overviewTitle: "نظرة عامة على المنتج",
      highlightsTitle: "أبرز المزايا",
      notFoundTitle: "المنتج غير موجود",
      notFoundText: "هذا الرابط لا يطابق أي منتج حالي داخل مصفوفة بيانات المنتجات.",
      notFoundAction: "الرجوع إلى المنتجات",
      previousLabel: "الصورة السابقة",
      nextLabel: "الصورة التالية"
    },
    footer: {
      description: "واجهة متجر فاخرة ثنائية اللغة للتبغ الراقي والفحم الطبيعي وإكسسوارات التدخين المميزة.",
      linksTitle: "روابط سريعة",
      promiseTitle: "الوعد الفاخر",
      promiseText: "خلفيات فاتحة ولمسات سوداء وذهبية وصور غنية وصقل ثنائي اللغة لتشكيل هوية حديثة وفاخرة.",
      copy: (year) => `© ${year} Aurum Leaf. موقع ثابت ثنائي اللغة مبني باستخدام HTML وCSS وJavaScript فقط.`
    }
  }
};

const productsData = [
  {
    id: "amber-reserve",
    image: "https://images.pexels.com/photos/33698251/pexels-photo-33698251.jpeg?auto=compress&cs=tinysrgb&w=1200",
    images: [
      "https://images.pexels.com/photos/33698251/pexels-photo-33698251.jpeg?auto=compress&cs=tinysrgb&w=1400",
      "https://images.pexels.com/photos/33698249/pexels-photo-33698249.jpeg?auto=compress&cs=tinysrgb&w=1400",
      "https://images.pexels.com/photos/26729614/pexels-photo-26729614.jpeg?auto=compress&cs=tinysrgb&w=1400"
    ],
    title: {
      en: "Amber Reserve Molasses",
      ar: "معسل أمبر ريزيرف"
    },
    subtitle: {
      en: "Velvet-cut lounge blend with golden sweetness",
      ar: "خلطة صالات مخملية بلمسة حلاوة ذهبية"
    },
    description: {
      en: "Honeyed depth, ripe fruit notes, and a smooth lounge finish for premium shisha sessions.",
      ar: "عمق عسلي مع نغمات فاكهية ناضجة ولمسة ناعمة تناسب جلسات الشيشة الراقية."
    },
    details: {
      en: "Designed for premium display and refined service, this blend balances aroma, softness, and visual richness. It works well as a hero tobacco item on a luxury shelf or inside a lounge-style catalog.",
      ar: "صُممت هذه الخلطة للعرض الفاخر والتقديم الراقي، وهي توازن بين العطر والنعومة والحضور البصري الغني. وتناسب أن تكون منتج التبغ الأساسي على رف فاخر أو داخل كتالوج بطابع الصالات."
    },
    highlights: {
      en: [
        "Layered sweetness with a calm, polished finish.",
        "Luxury-friendly packaging style and shelf presence.",
        "Easy to duplicate later with more flavor variants."
      ],
      ar: [
        "حلاوة متدرجة مع نهاية هادئة ومصقولة.",
        "حضور بصري مناسب للتغليف والعرض الفاخر.",
        "سهل التوسعة لاحقًا بإضافة نكهات أخرى على نفس البنية."
      ]
    },
    type: {
      key: "tobacco",
      en: "Tobacco",
      ar: "تبغ"
    },
    weight: {
      key: "250g",
      en: "250 g",
      ar: "250 غرام"
    }
  },
  {
    id: "ember-cube",
    image: "https://images.pexels.com/photos/28834322/pexels-photo-28834322.jpeg?auto=compress&cs=tinysrgb&w=1200",
    images: [
      "https://images.pexels.com/photos/28834322/pexels-photo-28834322.jpeg?auto=compress&cs=tinysrgb&w=1400",
      "https://images.pexels.com/photos/33698251/pexels-photo-33698251.jpeg?auto=compress&cs=tinysrgb&w=1400",
      "https://images.pexels.com/photos/28865193/pexels-photo-28865193.jpeg?auto=compress&cs=tinysrgb&w=1400"
    ],
    title: {
      en: "Ember Cube Coal",
      ar: "فحم إمبر كيوب"
    },
    subtitle: {
      en: "Clean-burning coconut cubes for refined heat control",
      ar: "مكعبات جوز هند نظيفة الاحتراق لتحكم راقٍ بالحرارة"
    },
    description: {
      en: "Natural coconut cubes engineered for clean burn, even heat, and reliable lounge performance.",
      ar: "مكعبات جوز هند طبيعية تمنح احتراقًا نظيفًا وحرارة متوازنة وأداءً ثابتًا في الصالات."
    },
    details: {
      en: "This coal sample is positioned as a dependable premium heat source for tobacco service. It supports consistent session quality, low visual mess, and a more elegant product story for modern hospitality and retail counters.",
      ar: "يتم تقديم هذا الفحم كنموذج مصدر حرارة فاخر وموثوق لخدمة التبغ. فهو يدعم ثبات الجلسة وقلة الفوضى البصرية وقصة منتج أكثر أناقة لقطاع الضيافة والبيع الحديث."
    },
    highlights: {
      en: [
        "Stable temperature profile with clean visual presentation.",
        "Suitable for luxury lounge and boutique retail positioning.",
        "Simple data structure for adding more weights later."
      ],
      ar: [
        "حرارة ثابتة مع مظهر احتراق نظيف.",
        "مناسب للصالات الفاخرة ونقاط البيع الراقية.",
        "بنية بيانات بسيطة لإضافة أوزان أخرى لاحقًا."
      ]
    },
    type: {
      key: "coal",
      en: "Coal",
      ar: "فحم"
    },
    weight: {
      key: "1kg",
      en: "1 kg",
      ar: "1 كغ"
    }
  },
  {
    id: "noir-classic",
    image: "https://images.pexels.com/photos/19141889/pexels-photo-19141889.jpeg?auto=compress&cs=tinysrgb&w=1200",
    images: [
      "https://images.pexels.com/photos/19141889/pexels-photo-19141889.jpeg?auto=compress&cs=tinysrgb&w=1400",
      "https://images.pexels.com/photos/13511061/pexels-photo-13511061.jpeg?auto=compress&cs=tinysrgb&w=1400",
      "https://images.pexels.com/photos/28865193/pexels-photo-28865193.jpeg?auto=compress&cs=tinysrgb&w=1400"
    ],
    title: {
      en: "Noir Classic Cigarettes",
      ar: "سجائر نوار كلاسيك"
    },
    subtitle: {
      en: "A polished classic line for premium shelf identity",
      ar: "خط كلاسيكي مصقول لهوية رف فاخرة"
    },
    description: {
      en: "A polished premium line styled for elegant presentation, subtle aroma, and luxury retail appeal.",
      ar: "خط فاخر بتقديم أنيق ونكهة هادئة وحضور بصري مناسب للعرض الراقي."
    },
    details: {
      en: "This sample cigarette line is structured as a premium catalog item with a clean visual identity. It suits sophisticated product listings where the goal is clarity, elegance, and straightforward manual expansion in both languages.",
      ar: "تمت هيكلة هذا الخط من السجائر كنموذج ضمن كتالوج فاخر بهوية بصرية نظيفة. وهو مناسب لقوائم المنتجات الراقية عندما يكون الهدف هو الوضوح والأناقة وسهولة التوسعة اليدوية في اللغتين."
    },
    highlights: {
      en: [
        "Minimal luxury styling for modern premium catalogs.",
        "Bilingual content support built into the same product object.",
        "Easy to duplicate for more series or strengths."
      ],
      ar: [
        "تصميم فاخر هادئ يناسب الكتالوجات الحديثة.",
        "دعم ثنائي اللغة داخل نفس كائن المنتج.",
        "سهل النسخ لإضافة سلاسل أو درجات أخرى."
      ]
    },
    type: {
      key: "cigarettes",
      en: "Cigarettes",
      ar: "سجائر"
    },
    weight: {
      key: "200g",
      en: "200 g carton",
      ar: "كرتون 200 غرام"
    }
  },
  {
    id: "crystal-hookah",
    image: "https://images.pexels.com/photos/20122596/pexels-photo-20122596.jpeg?auto=compress&cs=tinysrgb&w=1200",
    images: [
      "https://images.pexels.com/photos/20122596/pexels-photo-20122596.jpeg?auto=compress&cs=tinysrgb&w=1400",
      "https://images.pexels.com/photos/26729614/pexels-photo-26729614.jpeg?auto=compress&cs=tinysrgb&w=1400",
      "https://images.pexels.com/photos/28865193/pexels-photo-28865193.jpeg?auto=compress&cs=tinysrgb&w=1400"
    ],
    title: {
      en: "Crystal Hookah Set",
      ar: "طقم شيشة كريستال"
    },
    subtitle: {
      en: "Statement accessory styling with showroom elegance",
      ar: "تصميم إكسسوارات لافت بأناقة صالة العرض"
    },
    description: {
      en: "A statement accessory set with refined metalwork, elegant profile, and showroom-ready detailing.",
      ar: "طقم إكسسوارات مميز بتشطيب معدني أنيق وهيئة فاخرة وتفاصيل جاهزة للعرض."
    },
    details: {
      en: "Created to complete a high-end smoking presentation, this accessory sample adds decorative value as much as functional value. It is ideal for a product detail page because it benefits from multiple images and visual storytelling.",
      ar: "تم إعداد هذا النموذج ليكمل عرض التدخين الفاخر، فهو يضيف قيمة جمالية بقدر ما يضيف قيمة عملية. ولذلك فهو مثالي لصفحة تفاصيل منتج تستفيد من تعدد الصور والسرد البصري."
    },
    highlights: {
      en: [
        "Premium silhouette and metallic finishing details.",
        "Best displayed with multiple product gallery images.",
        "Strong candidate for future size or color variations."
      ],
      ar: [
        "هيئة فاخرة مع تفاصيل معدنية مصقولة.",
        "يُعرض بأفضل شكل عبر معرض صور متعدد.",
        "مناسب لإضافة مقاسات أو ألوان لاحقًا."
      ]
    },
    type: {
      key: "accessories",
      en: "Accessories",
      ar: "إكسسوارات"
    },
    weight: {
      key: "2.5kg",
      en: "2.5 kg set",
      ar: "طقم 2.5 كغ"
    }
  }
];

let currentLanguage = getStoredLanguage();
let revealObserver = null;

const productState = {
  query: "",
  type: "",
  weight: ""
};

const detailState = {
  productId: "",
  currentImageIndex: 0
};

document.addEventListener("DOMContentLoaded", () => {
  initializeLanguageSwitcher();
  initializeMobileNav();
  initializeRevealObserver();
  initializeProductsPage();
  initializeProductDetailPage();
  setLanguage(currentLanguage);
});

function initializeLanguageSwitcher() {
  document.querySelectorAll("[data-lang-option]").forEach((button) => {
    button.addEventListener("click", () => {
      const nextLanguage = button.dataset.langOption;
      if (nextLanguage && nextLanguage !== currentLanguage) {
        setLanguage(nextLanguage);
      }
    });
  });
}

function initializeMobileNav() {
  const toggle = document.querySelector("[data-nav-toggle]");
  const panel = document.querySelector("[data-nav-panel]");
  const backdrop = document.querySelector("[data-nav-backdrop]");

  if (!toggle || !panel || !backdrop) {
    return;
  }

  const closeNav = () => {
    document.body.classList.remove("nav-open");
    toggle.setAttribute("aria-expanded", "false");
    updateNavA11yLabels();
  };

  const openNav = () => {
    document.body.classList.add("nav-open");
    toggle.setAttribute("aria-expanded", "true");
    updateNavA11yLabels();
  };

  toggle.addEventListener("click", () => {
    if (document.body.classList.contains("nav-open")) {
      closeNav();
      return;
    }

    openNav();
  });

  backdrop.addEventListener("click", closeNav);

  panel.querySelectorAll("a, [data-lang-option]").forEach((element) => {
    element.addEventListener("click", () => {
      if (window.innerWidth <= 820) {
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
    if (window.innerWidth > 820) {
      closeNav();
    }
  });
}

function setLanguage(language) {
  currentLanguage = language === "ar" ? "ar" : "en";
  storeLanguage(currentLanguage);

  document.documentElement.lang = currentLanguage;
  document.documentElement.dir = currentLanguage === "ar" ? "rtl" : "ltr";

  document.querySelectorAll("[data-lang-option]").forEach((button) => {
    button.classList.toggle("is-active", button.dataset.langOption === currentLanguage);
  });

  applyTranslations();
  refreshProductsUI();
  refreshProductDetailUI();
  updateNavA11yLabels();
}

function applyTranslations() {
  const page = document.body.dataset.page;
  if (page && translations[currentLanguage].meta[page]) {
    document.title = translations[currentLanguage].meta[page];
  }

  document.querySelectorAll("[data-i18n]").forEach((element) => {
    const value = getNestedValue(translations[currentLanguage], element.dataset.i18n);
    if (typeof value === "string") {
      element.textContent = value;
    }
  });

  document.querySelectorAll("[data-i18n-placeholder]").forEach((element) => {
    const value = getNestedValue(translations[currentLanguage], element.dataset.i18nPlaceholder);
    if (typeof value === "string") {
      element.setAttribute("placeholder", value);
    }
  });

  document.querySelectorAll("[data-i18n-alt]").forEach((element) => {
    const value = getNestedValue(translations[currentLanguage], element.dataset.i18nAlt);
    if (typeof value === "string") {
      element.setAttribute("alt", value);
    }
  });

  document.querySelectorAll("[data-i18n-aria-label]").forEach((element) => {
    const value = getNestedValue(translations[currentLanguage], element.dataset.i18nAriaLabel);
    if (typeof value === "string") {
      element.setAttribute("aria-label", value);
    }
  });

  const footerCopy = document.querySelector("[data-footer-copy]");
  if (footerCopy) {
    footerCopy.textContent = translations[currentLanguage].footer.copy(new Date().getFullYear());
  }
}

function updateNavA11yLabels() {
  const toggle = document.querySelector("[data-nav-toggle]");
  const backdrop = document.querySelector("[data-nav-backdrop]");
  const srLabel = document.querySelector("[data-nav-toggle] .sr-only");
  const isOpen = document.body.classList.contains("nav-open");
  const toggleLabel = getNestedValue(translations[currentLanguage], isOpen ? "nav.closeLabel" : "nav.menuLabel");
  const closeLabel = getNestedValue(translations[currentLanguage], "nav.closeLabel");

  if (toggle && typeof toggleLabel === "string") {
    toggle.setAttribute("aria-label", toggleLabel);
  }

  if (srLabel && typeof toggleLabel === "string") {
    srLabel.textContent = toggleLabel;
  }

  if (backdrop && typeof closeLabel === "string") {
    backdrop.setAttribute("aria-label", closeLabel);
  }
}

function initializeProductsPage() {
  const grid = document.getElementById("products-grid");
  if (!grid) {
    return;
  }

  const searchInput = document.getElementById("product-search");
  const typeFilter = document.getElementById("type-filter");
  const weightFilter = document.getElementById("weight-filter");

  searchInput.addEventListener("input", (event) => {
    productState.query = event.target.value.trim();
    renderProducts();
  });

  typeFilter.addEventListener("change", (event) => {
    productState.type = event.target.value;
    renderProducts();
  });

  weightFilter.addEventListener("change", (event) => {
    productState.weight = event.target.value;
    renderProducts();
  });
}

function refreshProductsUI() {
  const grid = document.getElementById("products-grid");
  if (!grid) {
    return;
  }

  populateFilterOptions();
  renderProducts();
}

function populateFilterOptions() {
  const typeFilter = document.getElementById("type-filter");
  const weightFilter = document.getElementById("weight-filter");

  if (!typeFilter || !weightFilter) {
    return;
  }

  const typeMap = new Map();
  const weightMap = new Map();

  productsData.forEach((product) => {
    typeMap.set(product.type.key, product.type[currentLanguage]);
    weightMap.set(product.weight.key, product.weight[currentLanguage]);
  });

  typeFilter.innerHTML = [
    `<option value="">${translations[currentLanguage].products.filters.allTypes}</option>`,
    ...Array.from(typeMap.entries()).map(([key, label]) => `<option value="${key}">${label}</option>`)
  ].join("");

  weightFilter.innerHTML = [
    `<option value="">${translations[currentLanguage].products.filters.allWeights}</option>`,
    ...Array.from(weightMap.entries()).map(([key, label]) => `<option value="${key}">${label}</option>`)
  ].join("");

  typeFilter.value = productState.type;
  weightFilter.value = productState.weight;
}

function renderProducts() {
  const grid = document.getElementById("products-grid");
  const countElement = document.getElementById("results-count");

  if (!grid || !countElement) {
    return;
  }

  const query = productState.query.toLowerCase();

  const filteredProducts = productsData.filter((product) => {
    const matchesType = !productState.type || product.type.key === productState.type;
    const matchesWeight = !productState.weight || product.weight.key === productState.weight;
    const searchSpace = [
      product.title.en,
      product.title.ar,
      product.subtitle.en,
      product.subtitle.ar,
      product.description.en,
      product.description.ar,
      product.details.en,
      product.details.ar,
      ...product.highlights.en,
      ...product.highlights.ar,
      product.type.en,
      product.type.ar,
      product.weight.en,
      product.weight.ar
    ].join(" ").toLowerCase();
    const matchesQuery = !query || searchSpace.includes(query);

    return matchesType && matchesWeight && matchesQuery;
  });

  countElement.textContent = translations[currentLanguage].products.countLabel(filteredProducts.length);

  if (filteredProducts.length === 0) {
    grid.innerHTML = `
      <article class="product-empty reveal is-visible">
        <h3>${translations[currentLanguage].products.emptyTitle}</h3>
        <p>${translations[currentLanguage].products.emptyText}</p>
      </article>
    `;
    return;
  }

  grid.innerHTML = filteredProducts
    .map((product, index) => {
      const typeLabel = product.type[currentLanguage];
      const weightLabel = product.weight[currentLanguage];
      const title = product.title[currentLanguage];
      const description = product.description[currentLanguage];
      const coverImage = getProductCoverImage(product);

      return `
        <a class="product-card product-link reveal" style="--delay:${index * 0.08}s;" href="product-details.html?id=${product.id}">
          <figure class="product-media">
            <img src="${coverImage}" alt="${title}" loading="lazy">
            <span class="product-type-badge">${typeLabel}</span>
          </figure>
          <div class="product-body">
            <h3>${title}</h3>
            <p>${description}</p>
            <div class="product-meta">
              <span>${translations[currentLanguage].products.labels.type}: ${typeLabel}</span>
              <span>${translations[currentLanguage].products.labels.weight}: ${weightLabel}</span>
            </div>
            <span class="product-link__footer">${translations[currentLanguage].products.detailCta}</span>
          </div>
        </a>
      `;
    })
    .join("");

  bindRevealElements(grid.querySelectorAll(".reveal"));
}

function initializeProductDetailPage() {
  const root = document.getElementById("product-detail-root");
  if (!root) {
    return;
  }

  const params = new URLSearchParams(window.location.search);
  detailState.productId = params.get("id") || "";
  detailState.currentImageIndex = 0;
}

function refreshProductDetailUI() {
  const root = document.getElementById("product-detail-root");
  if (!root) {
    return;
  }

  renderProductDetail();
}

function renderProductDetail() {
  const root = document.getElementById("product-detail-root");
  if (!root) {
    return;
  }

  const product = findProductById(detailState.productId);

  if (!product) {
    document.title = translations[currentLanguage].meta.productDetail;
    root.innerHTML = `
      <article class="detail-not-found">
        <h2>${translations[currentLanguage].detail.notFoundTitle}</h2>
        <p>${translations[currentLanguage].detail.notFoundText}</p>
        <a class="button button-primary" href="products.html">${translations[currentLanguage].detail.notFoundAction}</a>
      </article>
    `;
    return;
  }

  const images = getProductImages(product);
  if (detailState.currentImageIndex >= images.length) {
    detailState.currentImageIndex = 0;
  }

  const imageIndex = detailState.currentImageIndex;
  const mainImage = images[imageIndex];
  const title = product.title[currentLanguage];
  const subtitle = product.subtitle[currentLanguage];
  const description = product.description[currentLanguage];
  const details = product.details[currentLanguage];
  const highlights = product.highlights[currentLanguage];
  const typeLabel = product.type[currentLanguage];
  const weightLabel = product.weight[currentLanguage];

  document.title = `${title} | Aurum Leaf`;

  root.innerHTML = `
    <div class="product-detail-shell">
      <section class="detail-gallery">
        <figure class="detail-stage">
          <img src="${mainImage}" alt="${title}" loading="eager">
          <div class="detail-gallery__actions">
            <span class="detail-counter">${imageIndex + 1} / ${images.length}</span>
            ${
              images.length > 1
                ? `<div class="detail-controls">
                    <button class="detail-control" type="button" data-detail-prev aria-label="${translations[currentLanguage].detail.previousLabel}">‹</button>
                    <button class="detail-control" type="button" data-detail-next aria-label="${translations[currentLanguage].detail.nextLabel}">›</button>
                  </div>`
                : ""
            }
          </div>
        </figure>
        ${
          images.length > 1
            ? `<div class="detail-thumbnails">
                ${images
                  .map(
                    (image, index) => `
                      <button
                        class="detail-thumbnail ${index === imageIndex ? "is-active" : ""}"
                        type="button"
                        data-detail-thumb="${index}"
                        aria-label="${title} ${index + 1}"
                      >
                        <img src="${image}" alt="${title} ${index + 1}" loading="lazy">
                      </button>
                    `
                  )
                  .join("")}
              </div>`
            : ""
        }
      </section>

      <section class="detail-copy">
        <div class="detail-topbar">
          <a class="detail-back" href="products.html">${translations[currentLanguage].detail.back}</a>
          <span class="detail-category">${typeLabel}</span>
        </div>
        <h2>${title}</h2>
        <p class="detail-subtitle">${subtitle}</p>
        <p class="detail-description">${description}</p>

        <div class="detail-meta">
          <span>${translations[currentLanguage].products.labels.type}: ${typeLabel}</span>
          <span>${translations[currentLanguage].products.labels.weight}: ${weightLabel}</span>
        </div>

        <article class="detail-block">
          <h3>${translations[currentLanguage].detail.overviewTitle}</h3>
          <p>${details}</p>
        </article>

        <article class="detail-block">
          <h3>${translations[currentLanguage].detail.highlightsTitle}</h3>
          <ul class="detail-highlights">
            ${highlights.map((highlight) => `<li>${highlight}</li>`).join("")}
          </ul>
        </article>
      </section>
    </div>
  `;

  bindProductDetailEvents(images.length);
}

function bindProductDetailEvents(imageCount) {
  const previousButton = document.querySelector("[data-detail-prev]");
  const nextButton = document.querySelector("[data-detail-next]");
  const thumbnailButtons = document.querySelectorAll("[data-detail-thumb]");

  if (previousButton) {
    previousButton.addEventListener("click", () => {
      detailState.currentImageIndex = (detailState.currentImageIndex - 1 + imageCount) % imageCount;
      renderProductDetail();
    });
  }

  if (nextButton) {
    nextButton.addEventListener("click", () => {
      detailState.currentImageIndex = (detailState.currentImageIndex + 1) % imageCount;
      renderProductDetail();
    });
  }

  thumbnailButtons.forEach((button) => {
    button.addEventListener("click", () => {
      detailState.currentImageIndex = Number(button.dataset.detailThumb || 0);
      renderProductDetail();
    });
  });
}

function initializeRevealObserver() {
  if ("IntersectionObserver" in window) {
    revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            revealObserver.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.18,
        rootMargin: "0px 0px -10% 0px"
      }
    );
  }

  bindRevealElements(document.querySelectorAll(".reveal"));
}

function bindRevealElements(elements) {
  elements.forEach((element) => {
    if (element.dataset.revealBound === "true") {
      return;
    }

    element.dataset.revealBound = "true";

    if (!revealObserver) {
      element.classList.add("is-visible");
      return;
    }

    revealObserver.observe(element);
  });
}

function getNestedValue(source, path) {
  return path.split(".").reduce((value, key) => {
    if (value && Object.prototype.hasOwnProperty.call(value, key)) {
      return value[key];
    }
    return undefined;
  }, source);
}

function findProductById(productId) {
  return productsData.find((product) => product.id === productId);
}

function getProductImages(product) {
  if (Array.isArray(product.images) && product.images.length > 0) {
    return product.images;
  }

  return product.image ? [product.image] : [];
}

function getProductCoverImage(product) {
  return getProductImages(product)[0] || "";
}

function getStoredLanguage() {
  try {
    const storedValue = window.localStorage.getItem(STORAGE_KEY);
    return storedValue === "ar" ? "ar" : "en";
  } catch (error) {
    return "en";
  }
}

function storeLanguage(language) {
  try {
    window.localStorage.setItem(STORAGE_KEY, language);
  } catch (error) {
    // Ignore storage failures so the site still works when opened directly from the filesystem.
  }
}

/*
DEVELOPER NOTES
1. How to add a new product:
   - Open this file and find the "productsData" array.
   - Copy one full product object, paste it below the last one, then change the id, title, subtitle, description, details, highlights, type, weight, and image list.

2. How to add Arabic and English data for the same product:
   - Each product uses one object with bilingual fields inside it.
   - Example:
     title: { en: "English name", ar: "الاسم العربي" }
     description: { en: "English text", ar: "النص العربي" }
     subtitle: { en: "English subtitle", ar: "العنوان الفرعي بالعربية" }
     details: { en: "Long English details", ar: "تفاصيل عربية أطول" }
   - This means you do NOT need two separate arrays. One product object contains both languages and powers both the product card and the detail page.

3. Where to duplicate product entries manually:
   - Duplicate a whole object inside the "productsData" array.
   - The cleanest place is directly under the last existing product object so all products stay together.

4. How the bilingual product structure works:
   - "type" and "weight" also contain both languages plus a simple key.
   - Example:
     type: { key: "tobacco", en: "Tobacco", ar: "تبغ" }
     weight: { key: "250g", en: "250 g", ar: "250 غرام" }
   - The page reads the current language and automatically shows the correct text.

5. How to add new filter values:
   - Add a new product with a new "type.key" or "weight.key".
   - If that key did not exist before, the filter dropdowns will automatically create a new option from that product's bilingual labels.
   - Keep the key simple and consistent, like "500g" or "charcoal".

6. Where to replace images:
   - Product detail/gallery images are inside each product object in the "images" array.
   - The first image in the array becomes the main card image automatically.
   - Homepage and About page images are written directly in index.html and about.html in each <img src="..."> tag.
   - The map-style banner background is the local file: assets/world-map.svg
*/

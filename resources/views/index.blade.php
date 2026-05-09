@extends('layouts.app')

@section('title', 'الذكاء الاصطناعي التوليدي | نظم الوسائط المتعددة')

@section('content')
  <!-- ===================== HERO ===================== -->
  <section id="hero">
    <div class="hero-badge"><span></span> نظم الوسائط المتعددة · الجامعة الافتراضية السورية</div>
    <h1 class="hero-title">
      الذكاء الاصطناعي التوليدي<br/>
      <span class="line-grad">يعيد تشكيل الوسائط المتعددة</span>
    </h1>
    <p class="hero-sub">
      اكتشف كيف تُحوّل تقنيات الذكاء الاصطناعي التوليدي طريقة إنشاء الصور والصوت والفيديو،
      وتفتح آفاقاً جديدة لبناء نظم الوسائط المتعددة.
    </p>
    <div class="hero-cta">
      <a href="{{ url('/about') }}" class="btn-primary">ابدأ الاستكشاف</a>
      <a href="{{ url('/gallery') }}" class="btn-outline">شاهد الأمثلة</a>
    </div>

    <div class="hero-video-wrap">
      <video poster="{{ asset('images/hero-poster.jpg') }}" controls preload="metadata">
        <source src="{{ asset('videos/intro.mp4') }}" type="video/mp4">
        متصفحك لا يدعم عرض الفيديو.
      </video>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===================== ABOUT ===================== -->
  <section id="about">
    <div class="section-inner">
      <div class="about-text reveal">
        <span class="section-tag">التعريف</span>
        <h2 class="section-title">ما هو الذكاء الاصطناعي التوليدي؟</h2>
        <p class="section-desc">
          الذكاء الاصطناعي التوليدي هو فرع متقدم من الذكاء الاصطناعي يستخدم نماذج رياضية ضخمة مدرَّبة على كميات هائلة من البيانات،
          قادرة على توليد محتوى جديد أصيل — نصوص، صور، موسيقى، فيديو — من مجرد وصف نصي.
          تشمل أبرز تقنياته: النماذج التوليدية التنافسية (GANs)، ونماذج الانتشار (Diffusion Models)، والمحولات الكبيرة (LLMs).
        </p>
        <p class="section-desc" style="margin-top:14px;">
          في مجال الوسائط المتعددة، تُحدث هذه التقنية ثورة حقيقية في الإنتاج الإبداعي والتعليمي والتجاري،
          وتفتح آفاقاً غير مسبوقة لمن يحسن توظيفها.
        </p>
      </div>
      <div class="about-stats reveal" style="transition-delay:.15s">
        <div class="stat-card">
          <div class="stat-num">+200</div>
          <div class="stat-label">أداة ذكاء اصطناعي توليدية متاحة</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">4K</div>
          <div class="stat-label">دقة توليد الصور الحديثة</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">&lt;10ث</div>
          <div class="stat-label">متوسط وقت توليد صورة عالية الجودة</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">3 محاور</div>
          <div class="stat-label">صور · صوت · فيديو</div>
        </div>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===================== HOW IT WORKS ===================== -->
  <section id="how">
    <div class="section-inner">
      <div class="how-header reveal">
        <span class="section-tag">آلية العمل</span>
        <h2 class="section-title">كيف يُنتج الذكاء الاصطناعي الوسائط؟</h2>
        <p class="section-desc">عملية التوليد تمر بمراحل متسلسلة من التحليل إلى الإبداع</p>
      </div>
      <div class="steps-grid reveal" style="transition-delay:.1s">
        <div class="step-card">
          <div class="step-num">١</div>
          <div class="step-title">الإدخال النصي (Prompt)</div>
          <div class="step-desc">يصف المستخدم ما يريد توليده بلغة طبيعية أو أوامر محددة.</div>
        </div>
        <div class="step-card">
          <div class="step-num">٢</div>
          <div class="step-title">التحليل والترميز</div>
          <div class="step-desc">يحلل النموذج النص ويحوّله إلى متجهات رقمية عالية الأبعاد.</div>
        </div>
        <div class="step-card">
          <div class="step-num">٣</div>
          <div class="step-title">عملية التوليد</div>
          <div class="step-desc">يبني النموذج المحتوى خطوةً بخطوة مستعيناً بالأنماط المكتسبة من التدريب.</div>
        </div>
        <div class="step-card">
          <div class="step-num">٤</div>
          <div class="step-title">الإخراج النهائي</div>
          <div class="step-desc">يُنتج الملف النهائي (صورة / صوت / فيديو) جاهزاً للاستخدام.</div>
        </div>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===================== TOOLS ===================== -->
  <section id="tools">
    <div class="section-inner">
      <div class="tools-header reveal">
        <span class="section-tag">الأدوات</span>
        <h2 class="section-title">أبرز أدوات الذكاء الاصطناعي التوليدي</h2>
        <p class="section-desc">مجموعة من أشهر الأدوات المستخدمة في توليد محتوى الوسائط المتعددة</p>
      </div>
      <div class="tools-grid">
        <div class="tool-card reveal">
          <div class="tool-icon cyan">🎨</div>
          <div class="tool-name">Midjourney</div>
          <div class="tool-desc">من أقوى أدوات توليد الصور الفنية باستخدام الأوامر النصية، تتميز بجودة بصرية استثنائية وأسلوب فني فريد.</div>
        </div>
        <div class="tool-card reveal" style="transition-delay:.05s">
          <div class="tool-icon violet">⚡</div>
          <div class="tool-name">DALL·E 3</div>
          <div class="tool-desc">نموذج OpenAI لتوليد الصور، يتكامل مع ChatGPT ويتميز بفهم دقيق للسياق والتفاصيل النصية.</div>
        </div>
        <div class="tool-card reveal" style="transition-delay:.1s">
          <div class="tool-icon pink">🌊</div>
          <div class="tool-name">Stable Diffusion</div>
          <div class="tool-desc">نموذج مفتوح المصدر يُتيح التخصيص الكامل وتشغيله محلياً، مع مجتمع واسع من النماذج المخصصة.</div>
        </div>
        <div class="tool-card reveal" style="transition-delay:.15s">
          <div class="tool-icon gold">🎵</div>
          <div class="tool-name">Suno AI</div>
          <div class="tool-desc">أداة متقدمة لتوليد المقاطع الموسيقية الكاملة مع كلمات الأغاني من وصف نصي بسيط.</div>
        </div>
        <div class="tool-card reveal" style="transition-delay:.2s">
          <div class="tool-icon cyan">🎬</div>
          <div class="tool-name">Runway Gen-3</div>
          <div class="tool-desc">منصة رائدة في توليد وتحرير مقاطع الفيديو بالذكاء الاصطناعي، تدعم التحويل من صورة إلى فيديو.</div>
        </div>
        <div class="tool-card reveal" style="transition-delay:.25s">
          <div class="tool-icon violet">🔊</div>
          <div class="tool-name">ElevenLabs</div>
          <div class="tool-desc">المنصة الأبرز لتوليد الصوت واستنساخ الأصوات البشرية بدقة مذهلة وبأكثر من 30 لغة.</div>
        </div>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===================== GALLERY ===================== -->
  <section id="gallery">
    <div class="section-inner">
      <div class="gallery-header reveal">
        <span class="section-tag">المعرض البصري</span>
        <h2 class="section-title">صور مُولَّدة بالذكاء الاصطناعي</h2>
        <p class="section-desc">نماذج على مخرجات أدوات توليد الصور بعد المعالجة والتحسين</p>
      </div>
      <div class="gallery-grid reveal" style="transition-delay:.1s">
        <div class="img-card img-main">
          <img src="{{ asset('images/gallery/main.jpg') }}" alt="صورة رئيسية">
          <div class="img-label">AI Generated · Midjourney</div>
        </div>
        <div class="img-card img-sm">
          <img src="{{ asset('images/gallery/img2.jpg') }}" alt="صورة ٢">
          <div class="img-label">DALL·E 3</div>
        </div>
        <div class="img-card img-sm">
          <img src="{{ asset('images/gallery/img3.jpg') }}" alt="صورة ٣">
          <div class="img-label">Stable Diffusion</div>
        </div>
        <div class="img-card img-sm">
          <img src="{{ asset('images/gallery/img4.jpg') }}" alt="صورة ٤">
          <div class="img-label">Adobe Firefly</div>
        </div>
        <div class="img-card img-sm">
          <img src="{{ asset('images/gallery/img5.jpg') }}" alt="صورة ٥">
          <div class="img-label">Midjourney v6</div>
        </div>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===================== PROS & CONS ===================== -->
  <section id="proscons">
    <div class="section-inner">
      <div class="reveal" style="text-align:center; margin-bottom:0;">
        <span class="section-tag">التقييم</span>
        <h2 class="section-title">الإيجابيات والسلبيات</h2>
      </div>
      <div class="pros-cons-grid">
        <div class="pros-box reveal">
          <div class="box-title"><span class="dot"></span> الإيجابيات</div>
          <ul class="pc-list">
            <li><span class="ico">✓</span> توليد محتوى إبداعي عالي الجودة في ثوانٍ معدودة</li>
            <li><span class="ico">✓</span> خفض تكاليف الإنتاج بشكل كبير مقارنةً بالأساليب التقليدية</li>
            <li><span class="ico">✓</span> إمكانية التخصيص الكامل وتكييف المحتوى مع أي أسلوب بصري</li>
            <li><span class="ico">✓</span> دعم لغات ومناطق جغرافية متعددة بلا تكلفة إضافية</li>
            <li><span class="ico">✓</span> تحفيز الإبداع وتمكين المستخدمين غير المحترفين من الإنتاج</li>
          </ul>
        </div>
        <div class="cons-box reveal" style="transition-delay:.1s">
          <div class="box-title"><span class="dot"></span> السلبيات</div>
          <ul class="pc-list">
            <li><span class="ico">✗</span> مخاوف جدية حول حقوق الملكية الفكرية والمحتوى المُولَّد</li>
            <li><span class="ico">✗</span> إمكانية استخدامه في نشر المعلومات المضللة والـ Deepfake</li>
            <li><span class="ico">✗</span> الاعتماد المفرط قد يُضعف المهارات الإبداعية البشرية</li>
            <li><span class="ico">✗</span> النتائج قد تحتوي أحياناً على أخطاء وتشوهات تتطلب تدقيقاً</li>
            <li><span class="ico">✗</span> التكلفة الحسابية العالية وأثرها البيئي الكبير</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- ===================== EXAMPLES (videos) ===================== -->
  <section id="examples">
    <div class="section-inner">
      <div class="examples-header reveal">
        <span class="section-tag">أمثلة حية</span>
        <h2 class="section-title">مقاطع فيديو تعليمية</h2>
        <p class="section-desc">مقاطع شارحة تستعرض مبادئ عمل الأدوات ونماذج مخرجاتها</p>
      </div>
      <div class="examples-grid">
        <div class="example-card reveal">
          <div class="vid-thumb">
            <video poster="{{ asset('videos/thumb1.jpg') }}" controls preload="metadata">
              <source src="{{ asset('videos/example1.mp4') }}" type="video/mp4">
            </video>
            <div class="play-badge">فيديو ١</div>
          </div>
          <div class="example-info">
            <div class="example-title">مقدمة إلى نماذج الانتشار</div>
            <div class="example-desc">شرح مرئي لكيفية عمل Diffusion Models في توليد الصور خطوةً بخطوة.</div>
          </div>
        </div>
        <div class="example-card reveal" style="transition-delay:.08s">
          <div class="vid-thumb">
            <video poster="{{ asset('videos/thumb2.jpg') }}" controls preload="metadata">
              <source src="{{ asset('videos/example2.mp4') }}" type="video/mp4">
            </video>
            <div class="play-badge">فيديو ٢</div>
          </div>
          <div class="example-info">
            <div class="example-title">توليد الصوت البشري بـ ElevenLabs</div>
            <div class="example-desc">عرض تطبيقي لأداة ElevenLabs وطريقة استنساخ الأصوات وتوليد التعليقات الصوتية.</div>
          </div>
        </div>
        <div class="example-card reveal" style="transition-delay:.16s">
          <div class="vid-thumb">
            <video poster="{{ asset('videos/thumb3.jpg') }}" controls preload="metadata">
              <source src="{{ asset('videos/example3.mp4') }}" type="video/mp4">
            </video>
            <div class="play-badge">فيديو ٣</div>
          </div>
          <div class="example-info">
            <div class="example-title">من صورة إلى فيديو بـ Runway</div>
            <div class="example-desc">عرض لقدرات Runway Gen-3 في تحويل الصور الثابتة إلى مقاطع فيديو متحركة.</div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
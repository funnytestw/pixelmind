

<?php $__env->startSection('title', 'ما هو الذكاء الاصطناعي التوليدي؟ | نظم الوسائط المتعددة'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* ========== أنماط خاصة بصفحة "ما هو؟" فقط ========== */
    .page-hero {
        position: relative;
        z-index: 1;
        padding: 140px 5% 80px;
        text-align: center;
    }
    .page-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(0,229,255,.08);
        border: 1px solid rgba(0,229,255,.25);
        border-radius: 100px;
        padding: 6px 20px;
        font-size: .82rem;
        color: var(--accent-cyan);
        margin-bottom: 24px;
    }
    .page-tag span {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--accent-cyan);
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0%,100% { opacity:1; transform:scale(1); }
        50% { opacity:.4; transform:scale(.7); }
    }
    .page-title {
        font-family: var(--font-display);
        font-size: clamp(2rem,5vw,4rem);
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
    }
    .grad-text {
        background: linear-gradient(135deg, var(--accent-cyan) 0%, var(--accent-violet) 50%, var(--accent-pink) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .page-sub {
        max-width: 640px;
        margin: 0 auto;
        color: var(--text-muted);
        font-size: 1.05rem;
    }

    /* تعريف الكارد الرئيسي */
    .def-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: 24px;
        padding: 56px;
        max-width: 900px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
    }
    .def-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle at top right, rgba(0,229,255,.08), transparent 70%);
        pointer-events: none;
    }
    .def-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle at bottom left, rgba(155,92,246,.08), transparent 70%);
        pointer-events: none;
    }
    .def-quote {
        font-family: var(--font-display);
        font-size: clamp(1.15rem, 2.5vw, 1.55rem);
        font-weight: 600;
        line-height: 1.65;
        color: var(--text-primary);
        position: relative;
        z-index: 1;
    }
    .def-quote .hl { color: var(--accent-cyan); }
    .def-quote .hlv { color: var(--accent-violet); }

    /* الخط الزمني */
    .timeline {
        position: relative;
        padding-right: 40px;
    }
    .timeline::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        right: 20px;
        width: 2px;
        background: linear-gradient(to bottom, var(--accent-cyan), var(--accent-violet), var(--accent-pink));
    }
    .tl-item {
        position: relative;
        margin-bottom: 48px;
        padding-right: 48px;
    }
    .tl-dot {
        position: absolute;
        right: -28px;
        top: 6px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 2px solid var(--accent-cyan);
        background: var(--bg-deep);
        box-shadow: 0 0 12px rgba(0,229,255,.5);
    }
    .tl-year {
        font-size: .8rem;
        font-weight: 700;
        color: var(--accent-cyan);
        letter-spacing: .1em;
        margin-bottom: 6px;
    }
    .tl-title {
        font-family: var(--font-display);
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .tl-desc {
        color: var(--text-muted);
        font-size: .9rem;
        line-height: 1.65;
    }

    /* شبكة النماذج */
    .models-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    .model-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 32px 28px;
        transition: transform .3s, box-shadow .3s, border-color .3s;
        position: relative;
        overflow: hidden;
    }
    .model-card:hover {
        transform: translateY(-5px);
        border-color: rgba(0,229,255,.3);
        box-shadow: var(--glow-cyan);
    }
    .model-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        opacity: 0;
        transition: opacity .3s;
    }
    .model-card:hover::after { opacity: 1; }
    .mc-cyan::after { background: linear-gradient(90deg, var(--accent-cyan), var(--accent-violet)); }
    .mc-violet::after { background: linear-gradient(90deg, var(--accent-violet), var(--accent-pink)); }
    .mc-pink::after { background: linear-gradient(90deg, var(--accent-pink), var(--accent-gold)); }

    .model-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }
    .mi-cyan { background: rgba(0,229,255,.1); }
    .mi-violet { background: rgba(155,92,246,.1); }
    .mi-pink { background: rgba(240,89,200,.1); }

    .model-name {
        font-weight: 700;
        font-size: 1.05rem;
        margin-bottom: 8px;
    }
    .model-tag {
        display: inline-block;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .08em;
        padding: 3px 10px;
        border-radius: 20px;
        margin-bottom: 12px;
    }
    .mt-cyan { background: rgba(0,229,255,.1); color: var(--accent-cyan); }
    .mt-violet { background: rgba(155,92,246,.1); color: var(--accent-violet); }
    .mt-pink { background: rgba(240,89,200,.1); color: var(--accent-pink); }

    .model-desc {
        color: var(--text-muted);
        font-size: .88rem;
        line-height: 1.65;
    }

    /* جدول المقارنة */
    .compare-table {
        width: 100%;
        border-collapse: collapse;
        background: var(--bg-card);
        border-radius: var(--radius);
        overflow: hidden;
        border: 1px solid var(--border);
    }
    .compare-table th {
        background: rgba(0,229,255,.06);
        padding: 16px 20px;
        text-align: right;
        font-weight: 700;
        font-size: .88rem;
        color: var(--accent-cyan);
        border-bottom: 1px solid var(--border);
    }
    .compare-table td {
        padding: 16px 20px;
        font-size: .88rem;
        color: var(--text-muted);
        border-bottom: 1px solid rgba(255,255,255,.04);
        vertical-align: top;
    }
    .compare-table tr:last-child td { border-bottom: none; }
    .compare-table tr:hover td { background: rgba(0,229,255,.03); }

    .badge-yes { color: #4ade80; font-weight: 700; }
    .badge-partial { color: var(--accent-gold); font-weight: 700; }
    .badge-no { color: #f87171; font-weight: 700; }

    /* استجابة للشاشات الصغيرة */
    @media (max-width: 900px) {
        .models-grid { grid-template-columns: 1fr 1fr; }
        .compare-table { font-size: .8rem; }
    }
    @media (max-width: 600px) {
        .models-grid { grid-template-columns: 1fr; }
        .def-card { padding: 32px 24px; }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ========== HERO SECTION ========== -->
    <div class="page-hero">
        <div class="page-tag"><span></span> التعريف والمفاهيم الأساسية</div>
        <h1 class="page-title">ما هو <span class="grad-text">الذكاء الاصطناعي التوليدي</span>؟</h1>
        <p class="page-sub">رحلة معمّقة في فهم التقنية التي تعيد تشكيل عالم الإبداع الرقمي</p>
    </div>

    <!-- ========== DEFINITION CARD ========== -->
    <section>
        <div class="section-inner" style="padding-top:0;">
            <div class="def-card reveal">
                <p class="def-quote">
                    الذكاء الاصطناعي التوليدي (<span class="hl">Generative AI</span>) هو مجال من مجالات الذكاء الاصطناعي يُعنى بتدريب نماذج حسابية ضخمة على كميات هائلة من البيانات، بهدف توليد <span class="hlv">محتوى جديد وأصيل</span> لم يكن موجوداً من قبل — سواء كان نصاً أم صورةً أم صوتاً أم فيديو — وذلك استجابةً لأوامر أو أوصاف يقدمها المستخدم بلغة طبيعية.
                    <br/><br/>
                    تتميز هذه النماذج بقدرتها على <span class="hl">التعلم من الأنماط</span> المستخرجة من بيانات التدريب، ثم توظيف هذا الفهم لإنتاج مخرجات إبداعية تتجاوز مجرد نسخ ما رأته — بل تبتكر أسلوباً مستنبطاً من السياق والطلب.
                </p>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- ========== HISTORY TIMELINE ========== -->
    <section>
        <div class="section-inner">
            <div style="display:grid;grid-template-columns:1fr 1.4fr;gap:64px;align-items:start;">
                <div class="reveal">
                    <span class="section-tag">التطور التاريخي</span>
                    <h2 class="section-title">من الجذور إلى الثورة</h2>
                    <p class="section-desc">لم يظهر الذكاء الاصطناعي التوليدي فجأة — بل هو نتاج عقود من البحث والتطوير المتراكم في مجالات متعددة.</p>
                </div>
                <div class="timeline reveal" style="transition-delay:.1s">
                    <div class="tl-item">
                        <div class="tl-dot"></div>
                        <div class="tl-year">1950 — 1980</div>
                        <div class="tl-title">الأسس النظرية</div>
                        <div class="tl-desc">شبكات عصبية بدائية، نظرية المعلومات، وأولى محاولات محاكاة الإدراك البشري على الحاسوب.</div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot" style="border-color:var(--accent-violet);box-shadow:0 0 12px rgba(155,92,246,.5);"></div>
                        <div class="tl-year">2014</div>
                        <div class="tl-title">ولادة GANs</div>
                        <div class="tl-desc">قدّم إيان غودفيلو النماذج التوليدية التنافسية (GANs)، فتحت باباً جديداً لتوليد الصور الواقعية.</div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot" style="border-color:var(--accent-pink);box-shadow:0 0 12px rgba(240,89,200,.5);"></div>
                        <div class="tl-year">2017</div>
                        <div class="tl-title">ثورة المحولات (Transformers)</div>
                        <div class="tl-desc">ورقة "Attention is All You Need" غيّرت قواعد اللعبة وأرست أساس نماذج اللغة الكبيرة.</div>
                    </div>
                    <div class="tl-item">
                        <div class="tl-dot" style="border-color:var(--accent-gold);box-shadow:0 0 12px rgba(247,183,49,.5);"></div>
                        <div class="tl-year">2020 — 2023</div>
                        <div class="tl-title">الانفجار التوليدي</div>
                        <div class="tl-desc">GPT-3 ، DALL·E، Stable Diffusion، ChatGPT — موجة متتالية أوصلت التقنية للعموم.</div>
                    </div>
                    <div class="tl-item" style="margin-bottom:0;">
                        <div class="tl-dot" style="border-color:var(--accent-cyan);box-shadow:0 0 16px rgba(0,229,255,.7);width:20px;height:20px;right:-30px;top:4px;"></div>
                        <div class="tl-year">2024 — اليوم</div>
                        <div class="tl-title">عصر النماذج متعددة الوسائط</div>
                        <div class="tl-desc">نماذج تجمع النص والصوت والصورة والفيديو في نموذج واحد، بدقة وسرعة غير مسبوقتين.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- ========== MODELS SECTION ========== -->
    <section>
        <div class="section-inner">
            <div class="reveal" style="margin-bottom:48px;">
                <span class="section-tag">التقنيات الأساسية</span>
                <h2 class="section-title">أبرز نماذج الذكاء الاصطناعي التوليدي</h2>
                <p class="section-desc">ثلاثة مناهج تقنية مختلفة تقود عالم التوليد الآلي للمحتوى</p>
            </div>
            <div class="models-grid">
                <div class="model-card mc-cyan reveal">
                    <div class="model-icon mi-cyan">🔀</div>
                    <div class="model-name">النماذج التوليدية التنافسية</div>
                    <div class="model-tag mt-cyan">GANs</div>
                    <p class="model-desc">تتكون من شبكتين تتنافسان: المولّد يُنشئ بيانات مزيفة، والمميّز يحاول كشفها. يتحسن كلاهما بالتدريب حتى يصعب التمييز بين المزيف والحقيقي. مثالية لتوليد الوجوه والصور الواقعية.</p>
                </div>
                <div class="model-card mc-violet reveal" style="transition-delay:.08s">
                    <div class="model-icon mi-violet">🌊</div>
                    <div class="model-name">نماذج الانتشار</div>
                    <div class="model-tag mt-violet">Diffusion Models</div>
                    <p class="model-desc">تتعلم عكس عملية إضافة الضوضاء التدريجية للصور. تبدأ من ضجيج عشوائي وتُزيله خطوةً بخطوة لتُظهر الصورة المطلوبة. تقنية Stable Diffusion و DALL·E تعتمدها.</p>
                </div>
                <div class="model-card mc-pink reveal" style="transition-delay:.16s">
                    <div class="model-icon mi-pink">🧠</div>
                    <div class="model-name">نماذج اللغة الكبيرة</div>
                    <div class="model-tag mt-pink">LLMs & Transformers</div>
                    <p class="model-desc">تُدرَّب على مليارات النصوص وتتعلم التنبؤ بالكلمة التالية. تتميز بفهم السياق وتوليد النصوص والأكواد والمحادثات. GPT-4 وGemini أبرز أمثلتها.</p>
                </div>
                <div class="model-card mc-cyan reveal" style="transition-delay:.24s">
                    <div class="model-icon mi-cyan">🔄</div>
                    <div class="model-name">المحولات متعددة الوسائط</div>
                    <div class="model-tag mt-cyan">Multimodal</div>
                    <p class="model-desc">تمتد قدرات المحولات لتشمل الصور والصوت والفيديو، مما يُتيح نماذج واحدة تفهم وتُنتج أنواعاً مختلفة من المحتوى في آنٍ واحد.</p>
                </div>
                <div class="model-card mc-violet reveal" style="transition-delay:.32s">
                    <div class="model-icon mi-violet">🎲</div>
                    <div class="model-name">المشفرات التلقائية المتغيرة</div>
                    <div class="model-tag mt-violet">VAEs</div>
                    <p class="model-desc">تضغط البيانات في فضاء كامن ثم تُعيد بناءها. تُستخدم في ضغط الصور ونقل الأسلوب البصري (Style Transfer) وتوليد وجوه جديدة.</p>
                </div>
                <div class="model-card mc-pink reveal" style="transition-delay:.4s">
                    <div class="model-icon mi-pink">🌐</div>
                    <div class="model-name">الشبكات العصبية التكرارية</div>
                    <div class="model-tag mt-pink">RNNs & LSTMs</div>
                    <p class="model-desc">متخصصة في البيانات التسلسلية كالصوت والموسيقى. تحتفظ بالسياق عبر الزمن مما يجعلها فعّالة لتوليد التعليقات الصوتية والمقاطع الموسيقية.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- ========== COMPARISON TABLE ========== -->
    <section>
        <div class="section-inner">
            <div class="reveal" style="margin-bottom:40px;">
                <span class="section-tag">مقارنة</span>
                <h2 class="section-title">الذكاء الاصطناعي التوليدي مقابل التقليدي</h2>
            </div>
            <div style="overflow-x:auto;" class="reveal" style="transition-delay:.1s">
                <table class="compare-table">
                    <thead>
                        <tr>
                            <th>المعيار</th>
                            <th>الذكاء الاصطناعي التقليدي</th>
                            <th>الذكاء الاصطناعي التوليدي</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>الهدف الأساسي</td><td>التصنيف والتنبؤ</td><td>الإبداع والتوليد</td></tr>
                        <tr><td>المخرجات</td><td>تصنيفات، أرقام، قرارات</td><td>نصوص، صور، صوت، فيديو</td></tr>
                        <tr><td>إنشاء محتوى جديد</td><td class="badge-no">✗ محدود</td><td class="badge-yes">✓ جوهري</td></tr>
                        <tr><td>فهم السياق الإبداعي</td><td class="badge-no">✗ ضعيف</td><td class="badge-yes">✓ متقدم</td></tr>
                        <tr><td>حجم بيانات التدريب</td><td class="badge-partial">متوسط</td><td class="badge-no">ضخم جداً</td></tr>
                        <tr><td>التفاعل بالغة الطبيعية</td><td class="badge-no">✗ نادر</td><td class="badge-yes">✓ أساسي</td></tr>
                        <tr><td>تطبيقات الوسائط المتعددة</td><td class="badge-partial">⚡ جزئي</td><td class="badge-yes">✓ شامل</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdhOom\laravel\generative-ai\resources\views/about.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title', 'كيف يعمل الذكاء الاصطناعي التوليدي؟ | نظم الوسائط المتعددة'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* ========== أنماط خاصة بصفحة "كيف يعمل؟" فقط ========== */
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
        background: rgba(155,92,246,.08);
        border: 1px solid rgba(155,92,246,.25);
        border-radius: 100px;
        padding: 6px 20px;
        font-size: .82rem;
        color: var(--accent-violet);
        margin-bottom: 24px;
    }
    .page-tag span {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--accent-violet);
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
        background: linear-gradient(135deg, var(--accent-violet) 0%, var(--accent-cyan) 60%, var(--accent-pink) 100%);
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

    /* Pipeline flow */
    .pipeline {
        display: flex;
        flex-direction: column;
        gap: 0;
        max-width: 860px;
        margin: 0 auto;
    }
    .pipe-step {
        display: grid;
        grid-template-columns: 80px 1fr;
        gap: 24px;
        align-items: start;
        position: relative;
    }
    .pipe-step:not(:last-child)::after {
        content: '';
        position: absolute;
        right: 39px;
        top: 80px;
        bottom: -40px;
        width: 2px;
        background: linear-gradient(to bottom, var(--accent-violet), rgba(155,92,246,.2));
    }
    .pipe-left {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0;
    }
    .pipe-num {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent-violet), var(--accent-cyan));
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--font-display);
        font-size: 1.3rem;
        font-weight: 800;
        color: #fff;
        box-shadow: var(--glow-violet);
        flex-shrink: 0;
    }
    .pipe-body {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 28px 32px;
        margin-bottom: 40px;
        transition: transform .3s, border-color .3s;
    }
    .pipe-body:hover {
        transform: translateX(-4px);
        border-color: rgba(155,92,246,.3);
    }
    .pipe-title {
        font-family: var(--font-display);
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .pipe-title .emoji {
        font-size: 1.4rem;
    }
    .pipe-desc {
        color: var(--text-muted);
        font-size: .92rem;
        line-height: 1.7;
    }
    .pipe-sub {
        margin-top: 14px;
        padding: 14px 18px;
        background: rgba(155,92,246,.06);
        border: 1px solid rgba(155,92,246,.12);
        border-radius: 10px;
        font-size: .85rem;
        color: var(--text-muted);
    }
    .pipe-sub strong {
        color: var(--accent-violet);
    }

    /* Training grid */
    .training-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 32px;
    }
    .train-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 36px 30px;
        position: relative;
        overflow: hidden;
    }
    .train-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(0,229,255,.08), transparent 70%);
    }
    .train-icon {
        font-size: 2.4rem;
        margin-bottom: 18px;
    }
    .train-title {
        font-family: var(--font-display);
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 12px;
    }
    .train-desc {
        color: var(--text-muted);
        font-size: .9rem;
        line-height: 1.65;
    }
    .train-list {
        list-style: none;
        margin-top: 14px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .train-list li {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: .87rem;
        color: var(--text-muted);
    }
    .train-list li::before {
        content: '▸';
        color: var(--accent-cyan);
        flex-shrink: 0;
    }

    /* Generation tabs */
    .gen-tabs {
        display: flex;
        gap: 12px;
        margin-bottom: 32px;
        flex-wrap: wrap;
    }
    .gen-tab {
        padding: 10px 22px;
        border-radius: 100px;
        border: 1px solid var(--border);
        background: transparent;
        color: var(--text-muted);
        font-family: var(--font-body);
        font-size: .88rem;
        font-weight: 600;
        cursor: pointer;
        transition: all .2s;
    }
    .gen-tab.active,
    .gen-tab:hover {
        background: rgba(155,92,246,.12);
        border-color: rgba(155,92,246,.4);
        color: var(--accent-violet);
    }
    .gen-panels .gen-panel {
        display: none;
    }
    .gen-panels .gen-panel.active {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }
    .gen-info-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 32px;
    }
    .gen-info-title {
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .gen-info-desc {
        color: var(--text-muted);
        font-size: .9rem;
        line-height: 1.65;
    }
    .gen-vis {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .gen-vis-title {
        font-size: .8rem;
        font-weight: 700;
        color: var(--accent-violet);
        letter-spacing: .08em;
        text-transform: uppercase;
        margin-bottom: 4px;
    }
    .flow-row {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }
    .flow-box {
        padding: 8px 14px;
        border-radius: 10px;
        font-size: .8rem;
        font-weight: 600;
        white-space: nowrap;
    }
    .fb-input {
        background: rgba(0,229,255,.1);
        border: 1px solid rgba(0,229,255,.25);
        color: var(--accent-cyan);
    }
    .fb-process {
        background: rgba(155,92,246,.1);
        border: 1px solid rgba(155,92,246,.25);
        color: var(--accent-violet);
    }
    .fb-output {
        background: rgba(240,89,200,.1);
        border: 1px solid rgba(240,89,200,.25);
        color: var(--accent-pink);
    }
    .flow-arrow {
        color: var(--text-muted);
        font-size: 1.1rem;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .training-grid {
            grid-template-columns: 1fr;
        }
        .gen-panels .gen-panel.active {
            grid-template-columns: 1fr;
        }
    }
    @media (max-width: 600px) {
        .pipe-step {
            grid-template-columns: 56px 1fr;
            gap: 16px;
        }
        .pipe-step:not(:last-child)::after {
            right: 27px;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE HERO -->
    <div class="page-hero">
        <div class="page-tag"><span></span> آلية العمل والمراحل التقنية</div>
        <h1 class="page-title">كيف <span class="grad-text">يُنتج الذكاء الاصطناعي</span> الوسائط؟</h1>
        <p class="page-sub">رحلة من الأمر النصي إلى المحتوى الإبداعي — نفهم معاً ما يجري داخل هذه النماذج</p>
    </div>

    <!-- PIPELINE SECTION -->
    <section>
        <div class="section-inner" style="padding-top:0;">
            <div class="reveal" style="text-align:center;margin-bottom:56px;">
                <span class="section-tag-el">المسار التوليدي</span>
                <h2 class="section-title">من النص إلى المحتوى — خطوةً بخطوة</h2>
                <p class="section-desc">كل مرة تكتب أمراً (Prompt) يمر الذكاء الاصطناعي بهذه المراحل المتسلسلة</p>
            </div>
            <div class="pipeline">

                <div class="pipe-step reveal">
                    <div class="pipe-left"><div class="pipe-num">١</div></div>
                    <div class="pipe-body">
                        <div class="pipe-title"><span class="emoji">✍️</span> الإدخال النصي (Prompt Engineering)</div>
                        <p class="pipe-desc">يكتب المستخدم وصفاً نصياً بالغة الطبيعية يصف ما يريد توليده. كلما كان الوصف أكثر تفصيلاً وإبداعاً في اختيار الكلمات، كلما كانت النتيجة أقرب للمطلوب.</p>
                        <div class="pipe-sub"><strong>مثال:</strong> "صورة لمدينة مستقبلية في الليل، أسلوب سايبربانك، إضاءة نيون زرقاء وأحمر، تصوير جوي، 4K"</div>
                    </div>
                </div>

                <div class="pipe-step reveal" style="transition-delay:.08s">
                    <div class="pipe-left"><div class="pipe-num" style="background:linear-gradient(135deg,var(--accent-violet),var(--accent-pink));">٢</div></div>
                    <div class="pipe-body">
                        <div class="pipe-title"><span class="emoji">🔤</span> الترميز والتضمين (Tokenization & Embedding)</div>
                        <p class="pipe-desc">يُجزّئ النموذج النص إلى وحدات أصغر (Tokens)، ثم يُحوّل كل وحدة إلى متجه رقمي متعدد الأبعاد يمثّل معناها ضمن فضاء رياضي عالي الأبعاد (Latent Space).</p>
                        <div class="pipe-sub"><strong>مثال:</strong> "مدينة" ← متجه رقمي [0.23, -0.87, 0.54, ... 512 بُعداً]</div>
                    </div>
                </div>

                <div class="pipe-step reveal" style="transition-delay:.16s">
                    <div class="pipe-left"><div class="pipe-num" style="background:linear-gradient(135deg,var(--accent-cyan),var(--accent-violet));">٣</div></div>
                    <div class="pipe-body">
                        <div class="pipe-title"><span class="emoji">🧮</span> المعالجة بآلية الانتباه (Self-Attention)</div>
                        <p class="pipe-desc">تُحلّل طبقات المحول العلاقات بين كل أجزاء المدخل مع بعضها في آنٍ واحد. آلية "الانتباه الذاتي" تُحدد أي الكلمات أكثر أهمية للسياق وتُوزّع الأوزان وفقاً لذلك.</p>
                        <div class="pipe-sub"><strong>مثال:</strong> الكلمة "نيون" ترتبط بشدة بـ "إضاءة" و"ألوان" — يُعزّز النموذج هذه الروابط</div>
                    </div>
                </div>

                <div class="pipe-step reveal" style="transition-delay:.24s">
                    <div class="pipe-left"><div class="pipe-num" style="background:linear-gradient(135deg,var(--accent-pink),var(--accent-gold));">٤</div></div>
                    <div class="pipe-body">
                        <div class="pipe-title"><span class="emoji">🌊</span> عملية التوليد (Denoising / Decoding)</div>
                        <p class="pipe-desc">في نماذج الانتشار: يبدأ من صورة ضوضاء عشوائية ويُزيل الضوضاء تدريجياً مئات المرات موجَّهاً بالتضمينات النصية. في النماذج اللغوية: يُنتج كلمة واحدة في كل خطوة بناءً على السابقة.</p>
                        <div class="pipe-sub"><strong>الدقة:</strong> عادةً 20-50 خطوة لإزالة الضوضاء لتوليد صورة واحدة عالية الجودة</div>
                    </div>
                </div>

                <div class="pipe-step reveal" style="transition-delay:.32s">
                    <div class="pipe-left"><div class="pipe-num" style="background:linear-gradient(135deg,var(--accent-gold),var(--accent-cyan));">٥</div></div>
                    <div class="pipe-body">
                        <div class="pipe-title"><span class="emoji">✨</span> الإخراج والمعالجة النهائية (Post-Processing)</div>
                        <p class="pipe-desc">يُحوّل النموذج التمثيل الداخلي إلى ملف قابل للاستخدام. في الصور: ترقية الدقة وتحسين التفاصيل. في الصوت: ترشيح الضوضاء. في الفيديو: ضمان التماسك بين الإطارات.</p>
                        <div class="pipe-sub"><strong>المخرجات:</strong> صورة WEBP · مقطع صوتي MP3 · فيديو MP4 بدقة عالية</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- TRAINING vs INFERENCE -->
    <section>
        <div class="section-inner">
            <div class="reveal" style="text-align:center;margin-bottom:48px;">
                <span class="section-tag-el">مفاهيم التدريب</span>
                <h2 class="section-title">التدريب مقابل الاستنتاج</h2>
                <p class="section-desc">مرحلتان مختلفتان تماماً في حياة النموذج</p>
            </div>
            <div class="training-grid">
                <div class="train-card reveal">
                    <div class="train-icon">🏋️</div>
                    <div class="train-title">مرحلة التدريب (Training)</div>
                    <p class="train-desc">النموذج يتعلم من مليارات الأمثلة ويضبط أوزانه الداخلية (مليارات المعاملات) لتقليل الخطأ في تنبؤاته. تستغرق أسابيع أو أشهراً على مئات المعالجات GPU.</p>
                    <ul class="train-list">
                        <li>تحتاج كميات ضخمة من البيانات المتنوعة</li>
                        <li>تكلفة حسابية ومالية ضخمة جداً</li>
                        <li>تحدث مرة واحدة أو دورياً لتحديث النموذج</li>
                        <li>تُنتج النموذج النهائي الجاهز للاستخدام</li>
                    </ul>
                </div>
                <div class="train-card reveal" style="transition-delay:.1s">
                    <div class="train-icon">⚡</div>
                    <div class="train-title">مرحلة الاستنتاج (Inference)</div>
                    <p class="train-desc">النموذج المدرَّب مسبقاً يستقبل مدخلاً جديداً ويُولّد مخرجاً فورياً دون تعديل الأوزان. هذا ما يحدث في كل مرة تكتب أمراً وتضغط "توليد".</p>
                    <ul class="train-list">
                        <li>سريع نسبياً (ثوانٍ حتى دقائق)</li>
                        <li>تكلفة أقل بكثير من التدريب</li>
                        <li>يحدث في كل طلب توليد جديد</li>
                        <li>مُحسَّن للأجهزة المتاحة (GPU/TPU/CPU)</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- GENERATION TYPES (Tabs) -->
    <section>
        <div class="section-inner">
            <div class="reveal" style="margin-bottom:32px;">
                <span class="section-tag-el">أنواع التوليد</span>
                <h2 class="section-title">آليات التوليد حسب نوع الوسيط</h2>
            </div>
            <div class="gen-tabs reveal">
                <button class="gen-tab active" data-tab="img">🖼️ توليد الصور</button>
                <button class="gen-tab" data-tab="audio">🔊 توليد الصوت</button>
                <button class="gen-tab" data-tab="video">🎬 توليد الفيديو</button>
            </div>
            <div class="gen-panels reveal" style="transition-delay:.1s">
                <!-- Images -->
                <div class="gen-panel active" id="panel-img">
                    <div class="gen-info-card">
                        <div class="gen-info-title">🖼️ توليد الصور بالانتشار</div>
                        <p class="gen-info-desc">تعتمد معظم أدوات توليد الصور الحديثة على نماذج الانتشار الكامنة (Latent Diffusion). تُشفَّر الصورة إلى فضاء كامن مضغوط، تُضاف الضوضاء تدريجياً خلال التدريب، ثم يتعلم النموذج عكس هذه العملية موجَّهاً بالنص. هذا يُتيح التوليد بدقة عالية بكفاءة حسابية أكبر.</p>
                        <p class="gen-info-desc" style="margin-top:12px;">المفاتيح: <strong style="color:var(--accent-violet)">CFG Scale</strong> (قوة توجيه النص)، <strong style="color:var(--accent-cyan)">Steps</strong> (خطوات إزالة الضوضاء)، <strong style="color:var(--accent-pink)">Seed</strong> (التحكم بالعشوائية)</p>
                    </div>
                    <div class="gen-vis">
                        <div class="gen-vis-title">مسار توليد الصورة</div>
                        <div class="flow-row">
                            <div class="flow-box fb-input">نص الأمر</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-process">CLIP Encoder</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-process">تضمين نصي</div>
                        </div>
                        <div class="flow-row" style="margin: 4px 0;">
                            <div class="flow-box fb-process">ضوضاء عشوائية</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-process">U-Net × 20 خطوة</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-process">صورة كامنة</div>
                        </div>
                        <div class="flow-row">
                            <div class="flow-box fb-process">فك التشفير (VAE)</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-output">صورة WEBP نهائية</div>
                        </div>
                    </div>
                </div>
                <!-- Audio -->
                <div class="gen-panel" id="panel-audio">
                    <div class="gen-info-card">
                        <div class="gen-info-title">🔊 توليد الصوت والموسيقى</div>
                        <p class="gen-info-desc">يعمل توليد الصوت في مجالين: الكلام البشري (TTS) والموسيقى. في TTS يُحوَّل النص إلى ملامح صوتية (Mel Spectrogram) ثم إلى موجات صوتية. أما الموسيقى فتُولَّد عبر نماذج تتعلم الأنماط الزمنية والانسجام الموسيقي.</p>
                        <p class="gen-info-desc" style="margin-top:12px;">التقنيات: <strong style="color:var(--accent-violet)">WaveNet</strong>، <strong style="color:var(--accent-cyan)">AudioCraft</strong>، <strong style="color:var(--accent-pink)">VALL-E</strong> لاستنساخ الأصوات</p>
                    </div>
                    <div class="gen-vis">
                        <div class="gen-vis-title">مسار توليد الصوت</div>
                        <div class="flow-row">
                            <div class="flow-box fb-input">نص / وصف موسيقي</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-process">Language Model</div>
                        </div>
                        <div class="flow-row" style="margin:4px 0;">
                            <div class="flow-box fb-process">Codec Tokens</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-process">Audio Decoder</div>
                        </div>
                        <div class="flow-row">
                            <div class="flow-box fb-process">Mel Spectrogram</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-output">ملف صوتي MP3</div>
                        </div>
                    </div>
                </div>
                <!-- Video -->
                <div class="gen-panel" id="panel-video">
                    <div class="gen-info-card">
                        <div class="gen-info-title">🎬 توليد الفيديو</div>
                        <p class="gen-info-desc">توليد الفيديو هو التحدي الأصعب — يتطلب توليد سلسلة من الصور (الإطارات) متسقة بصرياً وزمنياً. تعتمد النماذج الحديثة على امتداد نماذج الانتشار إلى البُعد الزمني، مع آليات انتباه ثلاثية الأبعاد.</p>
                        <p class="gen-info-desc" style="margin-top:12px;">التقنيات: <strong style="color:var(--accent-violet)">Runway Gen-3</strong>، <strong style="color:var(--accent-cyan)">Sora</strong>، <strong style="color:var(--accent-pink)">Kling AI</strong></p>
                    </div>
                    <div class="gen-vis">
                        <div class="gen-vis-title">مسار توليد الفيديو</div>
                        <div class="flow-row">
                            <div class="flow-box fb-input">نص / صورة مرجعية</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-process">3D U-Net</div>
                        </div>
                        <div class="flow-row" style="margin:4px 0;">
                            <div class="flow-box fb-process">Temporal Attention</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-process">إطارات متسقة</div>
                        </div>
                        <div class="flow-row">
                            <div class="flow-box fb-process">Video Decoder</div>
                            <div class="flow-arrow">←</div>
                            <div class="flow-box fb-output">فيديو MP4 نهائي</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Switch between generation type tabs
    function switchTab(btn, tabId) {
        // Update tab buttons active class
        document.querySelectorAll('.gen-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        btn.classList.add('active');
        
        // Update panels
        document.querySelectorAll('.gen-panel').forEach(panel => {
            panel.classList.remove('active');
        });
        document.getElementById('panel-' + tabId).classList.add('active');
    }

    // Attach event listeners to tabs
    document.querySelectorAll('.gen-tab').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const tabId = this.getAttribute('data-tab');
            switchTab(this, tabId);
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdhOom\laravel\generative-ai\resources\views/how.blade.php ENDPATH**/ ?>
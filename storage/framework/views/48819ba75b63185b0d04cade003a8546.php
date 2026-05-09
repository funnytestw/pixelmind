

<?php $__env->startSection('title', 'أدوات الذكاء الاصطناعي التوليدي | نظم الوسائط المتعددة'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* ========== أنماط خاصة بصفحة الأدوات فقط ========== */
    .page-hero {
        position: relative;
        z-index: 1;
        padding: 140px 5% 60px;
        text-align: center;
    }
    .page-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(240,89,200,.08);
        border: 1px solid rgba(240,89,200,.25);
        border-radius: 100px;
        padding: 6px 20px;
        font-size: .82rem;
        color: var(--accent-pink);
        margin-bottom: 24px;
    }
    .page-tag span {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--accent-pink);
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
        background: linear-gradient(135deg, var(--accent-pink) 0%, var(--accent-violet) 50%, var(--accent-cyan) 100%);
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

    /* Section utilities */
    .section-tag-el {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: var(--accent-pink);
        margin-bottom: 14px;
    }
    .section-tag-el::before {
        content: '';
        width: 24px;
        height: 2px;
        background: var(--accent-pink);
        border-radius: 2px;
    }
    .section-title {
        font-family: var(--font-display);
        font-size: clamp(1.6rem,3vw,2.4rem);
        font-weight: 800;
        margin-bottom: 14px;
        line-height: 1.25;
    }
    .section-desc {
        color: var(--text-muted);
        font-size: 1rem;
    }

    /* Featured card */
    .featured-card {
        background: var(--bg-card);
        border: 1px solid rgba(0,229,255,.2);
        border-radius: 24px;
        padding: 48px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: center;
        position: relative;
        overflow: hidden;
        box-shadow: var(--glow-cyan);
    }
    .featured-card::before {
        content: 'ميزة';
        position: absolute;
        top: 20px;
        left: 28px;
        font-size: .7rem;
        font-weight: 800;
        letter-spacing: .12em;
        color: var(--accent-cyan);
        text-transform: uppercase;
        background: rgba(0,229,255,.08);
        border: 1px solid rgba(0,229,255,.2);
        padding: 4px 12px;
        border-radius: 20px;
    }
    .featured-card::after {
        content: '';
        position: absolute;
        top: -100px;
        left: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(0,229,255,.06), transparent 70%);
        pointer-events: none;
    }
    .feat-icon {
        font-size: 3.5rem;
        margin-bottom: 16px;
    }
    .feat-name {
        font-family: var(--font-display);
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 8px;
    }
    .feat-sub {
        color: var(--accent-cyan);
        font-size: .95rem;
        font-weight: 600;
        margin-bottom: 16px;
    }
    .feat-desc {
        color: var(--text-muted);
        font-size: .95rem;
        line-height: 1.7;
    }
    .feat-specs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-top: 24px;
    }
    .spec-item {
        background: rgba(0,229,255,.05);
        border: 1px solid rgba(0,229,255,.1);
        border-radius: 12px;
        padding: 16px;
    }
    .spec-label {
        font-size: .75rem;
        color: var(--text-muted);
        margin-bottom: 4px;
    }
    .spec-val {
        font-weight: 700;
        font-size: .95rem;
        color: var(--text-primary);
    }

    /* Tools grid */
    .tools-grid {
        display: grid;
        grid-template-columns: repeat(3,1fr);
        gap: 24px;
    }
    .tool-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 0;
        overflow: hidden;
        transition: transform .3s, box-shadow .3s;
        display: flex;
        flex-direction: column;
    }
    .tool-card:hover {
        transform: translateY(-6px);
    }
    .tool-card.img:hover { box-shadow: var(--glow-cyan); }
    .tool-card.audio:hover { box-shadow: var(--glow-pink); }
    .tool-card.video:hover { box-shadow: var(--glow-violet); }
    .tool-card.text:hover { box-shadow: 0 0 40px rgba(247,183,49,.35); }

    .tool-header {
        padding: 28px 28px 0;
    }
    .tool-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 16px;
    }
    .tool-emoji {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        flex-shrink: 0;
    }
    .te-cyan { background: rgba(0,229,255,.1); }
    .te-violet { background: rgba(155,92,246,.1); }
    .te-pink { background: rgba(240,89,200,.1); }
    .te-gold { background: rgba(247,183,49,.1); }

    .tool-badges {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 6px;
    }
    .badge {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: .7rem;
        font-weight: 700;
        letter-spacing: .06em;
    }
    .badge-free { background: rgba(74,222,128,.1); color: #4ade80; border: 1px solid rgba(74,222,128,.2); }
    .badge-paid { background: rgba(247,183,49,.1); color: var(--accent-gold); border: 1px solid rgba(247,183,49,.2); }
    .badge-open { background: rgba(0,229,255,.1); color: var(--accent-cyan); border: 1px solid rgba(0,229,255,.2); }
    .badge-cat { background: rgba(155,92,246,.1); color: var(--accent-violet); border: 1px solid rgba(155,92,246,.2); }

    .tool-name {
        font-family: var(--font-display);
        font-size: 1.2rem;
        font-weight: 800;
        margin-bottom: 4px;
    }
    .tool-tagline {
        color: var(--accent-cyan);
        font-size: .82rem;
        font-weight: 600;
        margin-bottom: 12px;
    }
    .tool-desc {
        color: var(--text-muted);
        font-size: .88rem;
        line-height: 1.65;
        padding: 0 28px;
    }
    .tool-footer {
        margin-top: auto;
        padding: 20px 28px 24px;
        border-top: 1px solid rgba(255,255,255,.04);
    }
    .tool-meta {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }
    .meta-item {
        font-size: .78rem;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .meta-item strong {
        color: var(--text-primary);
    }
    .stars {
        color: var(--accent-gold);
        font-size: .85rem;
        letter-spacing: 1px;
    }

    /* Comparison table */
    .compare-table {
        width: 100%;
        border-collapse: collapse;
        background: var(--bg-card);
        border-radius: var(--radius);
        overflow: hidden;
        border: 1px solid var(--border);
    }
    .compare-table th {
        background: rgba(240,89,200,.06);
        padding: 14px 18px;
        text-align: right;
        font-weight: 700;
        font-size: .85rem;
        color: var(--accent-pink);
        border-bottom: 1px solid var(--border);
    }
    .compare-table td {
        padding: 13px 18px;
        font-size: .85rem;
        color: var(--text-muted);
        border-bottom: 1px solid rgba(255,255,255,.04);
    }
    .compare-table tr:last-child td {
        border-bottom: none;
    }
    .compare-table tr:hover td {
        background: rgba(240,89,200,.02);
    }
    .tc-name {
        font-weight: 700;
        color: var(--text-primary);
    }
    .dot-yes { color: #4ade80; }
    .dot-no { color: #f87171; }
    .dot-partial { color: var(--accent-gold); }

    /* Responsive */
    @media (max-width: 1000px) {
        .tools-grid { grid-template-columns: 1fr 1fr; }
        .featured-card { grid-template-columns: 1fr; }
    }
    @media (max-width: 600px) {
        .tools-grid { grid-template-columns: 1fr; }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE HERO -->
    <div class="page-hero">
        <div class="page-tag"><span></span> دليل شامل بالأدوات</div>
        <h1 class="page-title">أبرز أدوات <span class="grad-text">الذكاء الاصطناعي التوليدي</span></h1>
        <p class="page-sub">مقارنة تفصيلية لأفضل الأدوات المتاحة لتوليد الصور والصوت والفيديو</p>
    </div>

    <!-- FEATURED TOOL (Midjourney) -->
    <section>
        <div class="section-inner" style="padding-top:0;">
            <div class="featured-card reveal">
                <div class="feat-text">
                    <div class="feat-icon">🎨</div>
                    <div class="feat-name">Midjourney v6</div>
                    <div class="feat-sub">الأداة الأعلى جودةً في توليد الصور الفنية</div>
                    <p class="feat-desc">تُعدّ Midjourney المعيار الذهبي في توليد الصور الاحترافية. تتميز بأسلوبها الفني الفريد وقدرتها الاستثنائية على إنتاج لوحات بصرية مذهلة من وصف نصي بسيط. الإصدار السادس يدعم التفاصيل الدقيقة والأنماط المتنوعة بدقة غير مسبوقة.</p>
                    <div class="feat-specs">
                        <div class="spec-item"><div class="spec-label">الدقة القصوى</div><div class="spec-val">2048 × 2048 px</div></div>
                        <div class="spec-item"><div class="spec-label">وقت التوليد</div><div class="spec-val">~60 ثانية</div></div>
                        <div class="spec-item"><div class="spec-label">السعر</div><div class="spec-val">$10/شهر</div></div>
                        <div class="spec-item"><div class="spec-label">منصة العمل</div><div class="spec-val">Discord / Web</div></div>
                    </div>
                </div>
                <div style="background:rgba(0,229,255,.04);border:1px solid var(--border);border-radius:16px;padding:32px;display:flex;flex-direction:column;gap:14px;">
                    <div style="font-size:.8rem;font-weight:700;color:var(--accent-cyan);letter-spacing:.1em;text-transform:uppercase;margin-bottom:8px;">نقاط القوة الرئيسية</div>
                    <div style="display:flex;flex-direction:column;gap:10px;">
                        <div style="display:flex;align-items:center;gap:10px;color:var(--text-muted);font-size:.9rem;"><span style="color:#4ade80;">✓</span> جودة فنية استثنائية</div>
                        <div style="display:flex;align-items:center;gap:10px;color:var(--text-muted);font-size:.9rem;"><span style="color:#4ade80;">✓</span> تنوع الأساليب البصرية</div>
                        <div style="display:flex;align-items:center;gap:10px;color:var(--text-muted);font-size:.9rem;"><span style="color:#4ade80;">✓</span> تفاصيل دقيقة للوجوه</div>
                        <div style="display:flex;align-items:center;gap:10px;color:var(--text-muted);font-size:.9rem;"><span style="color:#4ade80;">✓</span> تصوير معماري مذهل</div>
                        <div style="display:flex;align-items:center;gap:10px;color:var(--text-muted);font-size:.9rem;"><span style="color:#f87171;">✗</span> لا يعمل offline</div>
                        <div style="display:flex;align-items:center;gap:10px;color:var(--text-muted);font-size:.9rem;"><span style="color:#f87171;">✗</span> يتطلب اشتراكاً مدفوعاً</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- IMAGE TOOLS SECTION -->
    <section>
        <div class="section-inner">
            <div class="reveal" style="margin-bottom:40px;">
                <span class="section-tag-el">توليد الصور</span>
                <h2 class="section-title">أدوات توليد الصور الرائدة</h2>
            </div>
            <div class="tools-grid">
                <div class="tool-card img reveal">
                    <div class="tool-header">
                        <div class="tool-top">
                            <div class="tool-emoji te-violet">🌌</div>
                            <div class="tool-badges"><span class="badge badge-paid">مدفوع</span><span class="badge badge-cat">صور</span></div>
                        </div>
                        <div class="tool-name">DALL·E 3</div>
                        <div class="tool-tagline">نموذج OpenAI المدمج في ChatGPT</div>
                    </div>
                    <p class="tool-desc" style="margin-top:12px;">يتميز بفهم عميق للتعليمات النصية المعقدة وإنتاج صور تعكس كل تفاصيل الوصف بدقة. مثالي للتوليد عبر المحادثة الحوارية مع ChatGPT.</p>
                    <div class="tool-footer">
                        <div class="tool-meta">
                            <div class="meta-item"><span>⭐</span><span class="stars">★★★★☆</span></div>
                            <div class="meta-item"><strong>$20</strong>/شهر (مع ChatGPT Plus)</div>
                        </div>
                    </div>
                </div>
                <div class="tool-card img reveal" style="transition-delay:.06s">
                    <div class="tool-header">
                        <div class="tool-top">
                            <div class="tool-emoji te-cyan">🌊</div>
                            <div class="tool-badges"><span class="badge badge-open">مفتوح المصدر</span><span class="badge badge-cat">صور</span></div>
                        </div>
                        <div class="tool-name">Stable Diffusion</div>
                        <div class="tool-tagline">الحل المفتوح الأكثر مرونة</div>
                    </div>
                    <p class="tool-desc" style="margin-top:12px;">يمكن تشغيله محلياً على جهازك، مع إمكانية تدريب نماذج مخصصة (LoRA, DreamBooth). مجتمع ضخم وآلاف النماذج المجانية على Civitai.</p>
                    <div class="tool-footer">
                        <div class="tool-meta">
                            <div class="meta-item"><span class="stars">★★★★★</span></div>
                            <div class="meta-item"><strong>مجاني</strong> (محلي)</div>
                        </div>
                    </div>
                </div>
                <div class="tool-card img reveal" style="transition-delay:.12s">
                    <div class="tool-header">
                        <div class="tool-top">
                            <div class="tool-emoji te-pink">🔥</div>
                            <div class="tool-badges"><span class="badge badge-free">نسخة مجانية</span><span class="badge badge-cat">صور</span></div>
                        </div>
                        <div class="tool-name">Adobe Firefly</div>
                        <div class="tool-tagline">الذكاء الاصطناعي الإبداعي من Adobe</div>
                    </div>
                    <p class="tool-desc" style="margin-top:12px;">يتكامل مع Photoshop وIllustrator بسلاسة. مدرَّب على محتوى مرخص تجارياً، مما يجعله الأنسب للاستخدام التجاري المهني.</p>
                    <div class="tool-footer">
                        <div class="tool-meta">
                            <div class="meta-item"><span class="stars">★★★★☆</span></div>
                            <div class="meta-item"><strong>مجاني</strong> / Adobe CC</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- AUDIO TOOLS SECTION -->
    <section>
        <div class="section-inner">
            <div class="reveal" style="margin-bottom:40px;">
                <span class="section-tag-el" style="color:var(--accent-pink);">توليد الصوت</span>
                <h2 class="section-title">أدوات توليد الصوت والموسيقى</h2>
            </div>
            <div class="tools-grid">
                <div class="tool-card audio reveal">
                    <div class="tool-header">
                        <div class="tool-top">
                            <div class="tool-emoji te-cyan">🎙️</div>
                            <div class="tool-badges"><span class="badge badge-free">نسخة مجانية</span><span class="badge badge-cat">صوت</span></div>
                        </div>
                        <div class="tool-name">ElevenLabs</div>
                        <div class="tool-tagline">المعيار الذهبي في توليد الكلام البشري</div>
                    </div>
                    <p class="tool-desc" style="margin-top:12px;">يُنتج أصواتاً بشرية بجودة استوديو، يدعم استنساخ أي صوت من عينة 3 دقائق، ويغطي أكثر من 30 لغة بما فيها العربية بشكل ممتاز.</p>
                    <div class="tool-footer">
                        <div class="tool-meta">
                            <div class="meta-item"><span class="stars">★★★★★</span></div>
                            <div class="meta-item"><strong>$0-99</strong>/شهر</div>
                        </div>
                    </div>
                </div>
                <div class="tool-card audio reveal" style="transition-delay:.06s">
                    <div class="tool-header">
                        <div class="tool-top">
                            <div class="tool-emoji te-violet">🎵</div>
                            <div class="tool-badges"><span class="badge badge-free">نسخة مجانية</span><span class="badge badge-cat">موسيقى</span></div>
                        </div>
                        <div class="tool-name">Suno AI</div>
                        <div class="tool-tagline">أغاني كاملة من وصف نصي</div>
                    </div>
                    <p class="tool-desc" style="margin-top:12px;">يُولّد أغاني كاملة بكلمات وألحان في ثوانٍ. يدعم أنواعاً موسيقية متعددة من البوب إلى الكلاسيكي. النسخة المجانية تُتيح 50 أغنية يومياً.</p>
                    <div class="tool-footer">
                        <div class="tool-meta">
                            <div class="meta-item"><span class="stars">★★★★☆</span></div>
                            <div class="meta-item"><strong>مجاني</strong> / $10 شهرياً</div>
                        </div>
                    </div>
                </div>
                <div class="tool-card audio reveal" style="transition-delay:.12s">
                    <div class="tool-header">
                        <div class="tool-top">
                            <div class="tool-emoji te-gold">🎼</div>
                            <div class="tool-badges"><span class="badge badge-open">مفتوح المصدر</span><span class="badge badge-cat">موسيقى</span></div>
                        </div>
                        <div class="tool-name">AudioCraft (Meta)</div>
                        <div class="tool-tagline">مكتبة Meta مفتوحة المصدر</div>
                    </div>
                    <p class="tool-desc" style="margin-top:12px;">مكتبة شاملة من Meta تضم MusicGen وAudioGen وEnCodec. مثالية للباحثين والمطورين الذين يحتاجون تحكماً كاملاً في عملية التوليد الموسيقي.</p>
                    <div class="tool-footer">
                        <div class="tool-meta">
                            <div class="meta-item"><span class="stars">★★★★☆</span></div>
                            <div class="meta-item"><strong>مجاني</strong> بالكامل</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- VIDEO TOOLS SECTION -->
    <section>
        <div class="section-inner">
            <div class="reveal" style="margin-bottom:40px;">
                <span class="section-tag-el" style="color:var(--accent-violet);">توليد الفيديو</span>
                <h2 class="section-title">أدوات توليد الفيديو الأحدث</h2>
            </div>
            <div class="tools-grid">
                <div class="tool-card video reveal">
                    <div class="tool-header">
                        <div class="tool-top">
                            <div class="tool-emoji te-violet">🎬</div>
                            <div class="tool-badges"><span class="badge badge-paid">مدفوع</span><span class="badge badge-cat">فيديو</span></div>
                        </div>
                        <div class="tool-name">Runway Gen-3 Alpha</div>
                        <div class="tool-tagline">رائد صناعة الفيديو التوليدي</div>
                    </div>
                    <p class="tool-desc" style="margin-top:12px;">يحول النص والصور إلى مقاطع فيديو سينمائية. يدعم Motion Brush للتحكم بحركة عناصر بعينها. يُنتج فيديو حتى 10 ثوانٍ بدقة 1080p.</p>
                    <div class="tool-footer">
                        <div class="tool-meta">
                            <div class="meta-item"><span class="stars">★★★★★</span></div>
                            <div class="meta-item"><strong>$12-76</strong>/شهر</div>
                        </div>
                    </div>
                </div>
                <div class="tool-card video reveal" style="transition-delay:.06s">
                    <div class="tool-header">
                        <div class="tool-top">
                            <div class="tool-emoji te-cyan">✨</div>
                            <div class="tool-badges"><span class="badge badge-free">نسخة مجانية</span><span class="badge badge-cat">فيديو</span></div>
                        </div>
                        <div class="tool-name">Kling AI</div>
                        <div class="tool-tagline">المنافس الصيني الصاعد</div>
                    </div>
                    <p class="tool-desc" style="margin-top:12px;">نموذج صيني من Kuaishou يُنتج فيديوهات حتى 2 دقيقة بحركة واقعية مذهلة. يتميز بفهمه للفيزياء الواقعية وحركة السوائل.</p>
                    <div class="tool-footer">
                        <div class="tool-meta">
                            <div class="meta-item"><span class="stars">★★★★☆</span></div>
                            <div class="meta-item"><strong>مجاني</strong> / اشتراك</div>
                        </div>
                    </div>
                </div>
                <div class="tool-card video reveal" style="transition-delay:.12s">
                    <div class="tool-header">
                        <div class="tool-top">
                            <div class="tool-emoji te-pink">🌀</div>
                            <div class="tool-badges"><span class="badge badge-paid">مدفوع</span><span class="badge badge-cat">فيديو</span></div>
                        </div>
                        <div class="tool-name">Sora (OpenAI)</div>
                        <div class="tool-tagline">الأكثر إثارة للجدل والإعجاب</div>
                    </div>
                    <p class="tool-desc" style="margin-top:12px;">نموذج OpenAI الذي أذهل العالم بقدرته على توليد فيديوهات طويلة بدقة 1080p مع فهم عميق للفيزياء والمنظور الزمني.</p>
                    <div class="tool-footer">
                        <div class="tool-meta">
                            <div class="meta-item"><span class="stars">★★★★★</span></div>
                            <div class="meta-item"><strong>$20+</strong>/شهر</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- COMPARISON TABLE -->
    <section>
        <div class="section-inner">
            <div class="reveal" style="margin-bottom:40px;">
                <span class="section-tag-el">مقارنة شاملة</span>
                <h2 class="section-title">جدول مقارنة الأدوات</h2>
            </div>
            <div style="overflow-x:auto;" class="reveal">
                <table class="compare-table">
                    <thead>
                        <tr>
                            <th>الأداة</th>
                            <th>النوع</th>
                            <th>جودة المخرجات</th>
                            <th>العربية</th>
                            <th>استخدام تجاري</th>
                            <th>نسخة مجانية</th>
                            <th>Offline</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td class="tc-name">Midjourney</td><td>صور</td><td><span class="stars">★★★★★</span></td><td class="dot-partial">⚡ جزئي</td><td class="dot-yes">✓</td><td class="dot-no">✗</td><td class="dot-no">✗</td></tr>
                        <tr><td class="tc-name">DALL·E 3</td><td>صور</td><td><span class="stars">★★★★☆</span></td><td class="dot-yes">✓</td><td class="dot-yes">✓</td><td class="dot-yes">✓ محدود</td><td class="dot-no">✗</td></tr>
                        <tr><td class="tc-name">Stable Diffusion</td><td>صور</td><td><span class="stars">★★★★☆</span></td><td class="dot-partial">⚡ جزئي</td><td class="dot-yes">✓</td><td class="dot-yes">✓</td><td class="dot-yes">✓</td></tr>
                        <tr><td class="tc-name">Adobe Firefly</td><td>صور</td><td><span class="stars">★★★★☆</span></td><td class="dot-yes">✓</td><td class="dot-yes">✓ آمن</td><td class="dot-yes">✓ محدود</td><td class="dot-no">✗</td></tr>
                        <tr><td class="tc-name">ElevenLabs</td><td>صوت</td><td><span class="stars">★★★★★</span></td><td class="dot-yes">✓ ممتاز</td><td class="dot-yes">✓</td><td class="dot-yes">✓ محدود</td><td class="dot-no">✗</td></tr>
                        <tr><td class="tc-name">Suno AI</td><td>موسيقى</td><td><span class="stars">★★★★☆</span></td><td class="dot-yes">✓</td><td class="dot-partial">⚡ مشروط</td><td class="dot-yes">✓</td><td class="dot-no">✗</td></tr>
                        <tr><td class="tc-name">Runway Gen-3</td><td>فيديو</td><td><span class="stars">★★★★★</span></td><td class="dot-partial">⚡ جزئي</td><td class="dot-yes">✓</td><td class="dot-yes">✓ محدود</td><td class="dot-no">✗</td></tr>
                        <tr><td class="tc-name">Sora</td><td>فيديو</td><td><span class="stars">★★★★★</span></td><td class="dot-partial">⚡ جزئي</td><td class="dot-yes">✓</td><td class="dot-no">✗</td><td class="dot-no">✗</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AdhOom\laravel\generative-ai\resources\views/tools.blade.php ENDPATH**/ ?>
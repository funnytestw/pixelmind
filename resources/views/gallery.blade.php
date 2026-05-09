@extends('layouts.app')

@section('title', 'المعرض البصري | نظم الوسائط المتعددة')

@push('styles')
<style>
    /* ========== أنماط خاصة بصفحة المعرض فقط ========== */
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
        background: linear-gradient(135deg, var(--accent-cyan) 0%, var(--accent-violet) 60%, var(--accent-pink) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .page-sub {
        max-width: 600px;
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
        color: var(--accent-cyan);
        margin-bottom: 12px;
    }
    .section-tag-el::before {
        content: '';
        width: 24px;
        height: 2px;
        background: var(--accent-cyan);
        border-radius: 2px;
    }
    .section-title {
        font-family: var(--font-display);
        font-size: clamp(1.5rem,3vw,2.2rem);
        font-weight: 800;
        margin-bottom: 10px;
    }

    /* Filter bar */
    .filter-bar {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 36px;
        justify-content: center;
    }
    .filter-btn {
        padding: 9px 22px;
        border-radius: 100px;
        border: 1px solid var(--border);
        background: transparent;
        color: var(--text-muted);
        font-family: var(--font-body);
        font-size: .87rem;
        font-weight: 600;
        cursor: pointer;
        transition: all .25s;
    }
    .filter-btn.active, .filter-btn:hover {
        background: rgba(0,229,255,.1);
        border-color: rgba(0,229,255,.35);
        color: var(--accent-cyan);
    }

    /* Gallery sections */
    .gallery-section {
        margin-bottom: 64px;
    }
    .gallery-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }
    .gallery-count {
        font-size: .82rem;
        color: var(--text-muted);
        background: rgba(0,229,255,.06);
        border: 1px solid var(--border);
        padding: 4px 14px;
        border-radius: 20px;
    }

    /* Featured grid (masonry-like) */
    .grid-featured {
        display: grid;
        grid-template-columns: repeat(12,1fr);
        gap: 16px;
        margin-bottom: 16px;
    }
    .gi {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform .3s, box-shadow .3s, border-color .3s;
    }
    .gi:hover {
        transform: scale(1.02);
        border-color: rgba(0,229,255,.3);
        box-shadow: var(--glow-cyan);
    }
    .gi-1 { grid-column: span 7; min-height: 380px; }
    .gi-2 { grid-column: span 5; min-height: 380px; }
    .gi-3 { grid-column: span 4; min-height: 240px; }
    .gi-4 { grid-column: span 4; min-height: 240px; }
    .gi-5 { grid-column: span 4; min-height: 240px; }

    /* Regular grid */
    .grid-regular {
        display: grid;
        grid-template-columns: repeat(4,1fr);
        gap: 16px;
    }
    .gi-r {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        position: relative;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform .3s, box-shadow .3s, border-color .3s;
    }
    .gi-r:hover {
        transform: translateY(-4px);
        border-color: rgba(155,92,246,.3);
        box-shadow: var(--glow-violet);
    }

    /* Placeholder content (will be replaced with real images) */
    .ph-inner {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 24px;
        width: 100%;
        height: 100%;
        position: relative;
        z-index: 1;
    }
    .ph-icon svg {
        width: 40px;
        height: 40px;
        opacity: .25;
    }
    .ph-label {
        font-size: .8rem;
        color: rgba(255,255,255,.3);
        text-align: center;
    }
    .ph-gradient {
        position: absolute;
        inset: 0;
        opacity: .06;
    }
    .pg-1 { background: linear-gradient(135deg, #00e5ff, #9b5cf6); }
    .pg-2 { background: linear-gradient(135deg, #9b5cf6, #f059c8); }
    .pg-3 { background: linear-gradient(135deg, #f059c8, #f7b731); }
    .pg-4 { background: linear-gradient(135deg, #f7b731, #00e5ff); }
    .pg-5 { background: linear-gradient(135deg, #00e5ff, #f059c8); }

    /* Overlay info */
    .img-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 16px 18px;
        background: linear-gradient(to top, rgba(4,6,15,.9) 0%, transparent 100%);
        z-index: 2;
        opacity: 0;
        transition: opacity .3s;
    }
    .gi:hover .img-overlay, .gi-r:hover .img-overlay {
        opacity: 1;
    }
    .ov-tool {
        font-size: .7rem;
        font-weight: 700;
        color: var(--accent-cyan);
        letter-spacing: .08em;
        text-transform: uppercase;
        margin-bottom: 3px;
    }
    .ov-desc {
        font-size: .82rem;
        color: rgba(255,255,255,.8);
    }

    /* Image badge */
    .img-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        z-index: 3;
        background: rgba(4,6,15,.75);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 4px 10px;
        font-size: .7rem;
        color: var(--accent-cyan);
        backdrop-filter: blur(8px);
    }
    .img-badge.violet { color: var(--accent-violet); border-color: rgba(155,92,246,.3); }
    .img-badge.pink { color: var(--accent-pink); border-color: rgba(240,89,200,.3); }
    .img-badge.gold { color: var(--accent-gold); border-color: rgba(247,183,49,.3); }

    /* Stats bar */
    .stats-bar {
        display: grid;
        grid-template-columns: repeat(4,1fr);
        gap: 16px;
        margin-bottom: 48px;
    }
    .stat-item {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        text-align: center;
    }
    .stat-num {
        font-family: var(--font-display);
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--accent-cyan), var(--accent-violet));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .stat-lbl {
        color: var(--text-muted);
        font-size: .82rem;
        margin-top: 4px;
    }

    /* Lightbox */
    .lightbox {
        position: fixed;
        inset: 0;
        z-index: 200;
        background: rgba(4,6,15,.92);
        backdrop-filter: blur(16px);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 40px;
    }
    .lightbox.open {
        display: flex;
    }
    .lb-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: 24px;
        max-width: 820px;
        width: 100%;
        overflow: hidden;
        position: relative;
    }
    .lb-img {
        width: 100%;
        aspect-ratio: 16/9;
        background: linear-gradient(135deg, #0b0f1e, #12142a);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .lb-info {
        padding: 28px 32px;
    }
    .lb-tool {
        font-size: .75rem;
        font-weight: 700;
        color: var(--accent-cyan);
        letter-spacing: .1em;
        text-transform: uppercase;
        margin-bottom: 6px;
    }
    .lb-title {
        font-family: var(--font-display);
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .lb-desc {
        color: var(--text-muted);
        font-size: .9rem;
    }
    .lb-close {
        position: absolute;
        top: 16px;
        left: 16px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: var(--text-muted);
        font-size: 1.1rem;
        transition: background .2s;
    }
    .lb-close:hover {
        background: rgba(255,255,255,.15);
    }
    .lb-meta {
        display: flex;
        gap: 20px;
        margin-top: 16px;
        flex-wrap: wrap;
    }
    .lb-meta span {
        font-size: .8rem;
        color: var(--text-muted);
    }
    .lb-meta strong {
        color: var(--text-primary);
    }
    .prompt-box {
        background: rgba(0,229,255,.04);
        border: 1px solid rgba(0,229,255,.12);
        border-radius: 12px;
        padding: 14px 18px;
        margin-top: 14px;
    }
    .prompt-label {
        font-size: .72rem;
        font-weight: 700;
        color: var(--accent-cyan);
        letter-spacing: .08em;
        text-transform: uppercase;
        margin-bottom: 6px;
    }
    .prompt-text {
        font-size: .85rem;
        color: var(--text-muted);
        font-style: italic;
        direction: ltr;
        text-align: left;
    }

    /* Responsive */
    @media (max-width: 1000px) {
        .gi-1, .gi-2 { grid-column: span 12; min-height: 280px; }
        .gi-3, .gi-4, .gi-5 { grid-column: span 4; }
        .grid-regular { grid-template-columns: repeat(2,1fr); }
        .stats-bar { grid-template-columns: repeat(2,1fr); }
    }
    @media (max-width: 600px) {
        .grid-featured { display: flex; flex-direction: column; }
        .gi-3, .gi-4, .gi-5 { min-height: 180px; }
        .grid-regular { grid-template-columns: 1fr; }
        .stats-bar { grid-template-columns: repeat(2,1fr); }
    }
</style>
@endpush

@section('content')
    <!-- PAGE HERO -->
    <div class="page-hero">
        <div class="page-tag"><span></span> صور مُولَّدة بالذكاء الاصطناعي</div>
        <h1 class="page-title">المعرض <span class="grad-text">البصري</span></h1>
        <p class="page-sub">نماذج حقيقية على مخرجات أدوات الذكاء الاصطناعي التوليدي — بعد المعالجة والتحسين بصيغة WEBP/AVIF</p>
    </div>

    <section>
        <div class="section-inner" style="padding-top:0;">

            <!-- STATS BAR -->
            <div class="stats-bar reveal">
                <div class="stat-item"><div class="stat-num">20+</div><div class="stat-lbl">صورة معروضة</div></div>
                <div class="stat-item"><div class="stat-num">5</div><div class="stat-lbl">أدوات مختلفة</div></div>
                <div class="stat-item"><div class="stat-num">WEBP</div><div class="stat-lbl">صيغة الصور الثابتة</div></div>
                <div class="stat-item"><div class="stat-num">4K</div><div class="stat-lbl">أعلى دقة متاحة</div></div>
            </div>

            <!-- FILTER BAR -->
            <div class="filter-bar reveal">
                <button class="filter-btn active">الكل</button>
                <button class="filter-btn">🎨 Midjourney</button>
                <button class="filter-btn">⚡ DALL·E 3</button>
                <button class="filter-btn">🌊 Stable Diffusion</button>
                <button class="filter-btn">🔥 Adobe Firefly</button>
                <button class="filter-btn">✨ Ideogram</button>
            </div>

            <!-- SECTION 1: FEATURED (URBAN FUTURISTIC) -->
            <div class="gallery-section reveal">
                <div class="gallery-header">
                    <div>
                        <span class="section-tag-el">المجموعة الرئيسية</span>
                        <h2 class="section-title">مناظر حضرية مستقبلية</h2>
                    </div>
                    <div class="gallery-count">5 صور</div>
                </div>
                <div class="grid-featured">
                    <!-- ضع الصور الحقيقية في public/images/gallery/ -->
                    <div class="gi gi-1" onclick="openLb('lb1')">
                        <img src="{{ asset('images/gallery/futuristic_city.jpg') }}" alt="مدينة مستقبلية" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge">Midjourney v6</div>
                        <div class="img-overlay"><div class="ov-tool">Midjourney v6</div><div class="ov-desc">مدينة سايبربانك ليلية — إضاءة نيون</div></div>
                    </div>
                    <div class="gi gi-2" onclick="openLb('lb2')">
                        <img src="{{ asset('images/gallery/glass_tower.jpg') }}" alt="برج زجاجي" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge violet">DALL·E 3</div>
                        <div class="img-overlay"><div class="ov-tool">DALL·E 3</div><div class="ov-desc">ناطحة سحاب زجاجية بتصميم عضوي</div></div>
                    </div>
                    <div class="gi gi-3" onclick="openLb('lb3')">
                        <img src="{{ asset('images/gallery/rainy_street.jpg') }}" alt="شارع مطري" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge pink">Stable Diffusion</div>
                        <div class="img-overlay"><div class="ov-tool">Stable Diffusion XL</div><div class="ov-desc">شارع حضري في المطر</div></div>
                    </div>
                    <div class="gi gi-4" onclick="openLb('lb4')">
                        <img src="{{ asset('images/gallery/floating_garden.jpg') }}" alt="حديقة عائمة" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge gold">Adobe Firefly</div>
                        <div class="img-overlay"><div class="ov-tool">Adobe Firefly 3</div><div class="ov-desc">حديقة عائمة فوق المدينة</div></div>
                    </div>
                    <div class="gi gi-5" onclick="openLb('lb5')">
                        <img src="{{ asset('images/gallery/space_port.jpg') }}" alt="ميناء فضائي" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge">Ideogram</div>
                        <div class="img-overlay"><div class="ov-tool">Ideogram v2</div><div class="ov-desc">ميناء فضائي تحت الماء</div></div>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: PORTRAITS & ART -->
            <div class="gallery-section reveal" style="transition-delay:.1s">
                <div class="gallery-header">
                    <div>
                        <span class="section-tag-el" style="color:var(--accent-violet)">المجموعة الثانية</span>
                        <h2 class="section-title">شخصيات ومحاكاة فنية</h2>
                    </div>
                    <div class="gallery-count">8 صور</div>
                </div>
                <div class="grid-regular">
                    <div class="gi-r" onclick="openLb('lbp1')">
                        <img src="{{ asset('images/gallery/portrait1.jpg') }}" alt="بورتريه 1" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge violet">Midjourney</div>
                        <div class="img-overlay"><div class="ov-tool">Midjourney v6</div><div class="ov-desc">بورتريه بأسلوب النيوكلاسيك</div></div>
                    </div>
                    <div class="gi-r" onclick="openLb('lbp2')">
                        <img src="{{ asset('images/gallery/portrait2.jpg') }}" alt="بورتريه 2" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge pink">DALL·E 3</div>
                        <div class="img-overlay"><div class="ov-tool">DALL·E 3</div><div class="ov-desc">بورتريه بأسلوب انطباعي</div></div>
                    </div>
                    <div class="gi-r" onclick="openLb('lbp3')">
                        <img src="{{ asset('images/gallery/fantasy_char.jpg') }}" alt="شخصية خيالية" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge">Stable Diffusion</div>
                        <div class="img-overlay"><div class="ov-tool">SDXL + LoRA</div><div class="ov-desc">شخصية فانتازيا مع إضاءة سينمائية</div></div>
                    </div>
                    <div class="gi-r" onclick="openLb('lbp4')">
                        <img src="{{ asset('images/gallery/abstract.jpg') }}" alt="لوحة تجريدية" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge gold">Firefly</div>
                        <div class="img-overlay"><div class="ov-tool">Adobe Firefly 3</div><div class="ov-desc">لوحة تجريدية بألوان زاهية</div></div>
                    </div>
                    <div class="gi-r" onclick="openLb('lbp5')">
                        <img src="{{ asset('images/gallery/future_fashion.jpg') }}" alt="موضة مستقبلية" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge">Midjourney</div>
                        <div class="img-overlay"><div class="ov-tool">Midjourney v6</div><div class="ov-desc">أزياء مستقبلية بتفاصيل دقيقة</div></div>
                    </div>
                    <div class="gi-r" onclick="openLb('lbp6')">
                        <img src="{{ asset('images/gallery/typography.jpg') }}" alt="تصميم طباعي" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge violet">Ideogram</div>
                        <div class="img-overlay"><div class="ov-tool">Ideogram v2</div><div class="ov-desc">تصميم بوستر مع نصوص عربية</div></div>
                    </div>
                    <div class="gi-r" onclick="openLb('lbp7')">
                        <img src="{{ asset('images/gallery/fantasy_nature.jpg') }}" alt="طبيعة خيالية" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge pink">DALL·E 3</div>
                        <div class="img-overlay"><div class="ov-tool">DALL·E 3</div><div class="ov-desc">غابة بألوان ساحرة غير واقعية</div></div>
                    </div>
                    <div class="gi-r" onclick="openLb('lbp8')">
                        <img src="{{ asset('images/gallery/interior.jpg') }}" alt="معمار داخلي" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0;">
                        <div class="img-badge">Stable Diffusion</div>
                        <div class="img-overlay"><div class="ov-tool">SDXL + ControlNet</div><div class="ov-desc">تصميم داخلي بأسلوب باوهاوس</div></div>
                    </div>
                </div>
            </div>

            <!-- SECTION 3: COMPARISON (SAME PROMPT, DIFFERENT TOOLS) -->
            <div class="gallery-section reveal" style="transition-delay:.2s">
                <div class="gallery-header">
                    <div>
                        <span class="section-tag-el" style="color:var(--accent-pink)">المجموعة المقارنة</span>
                        <h2 class="section-title">نفس الأمر — أدوات مختلفة</h2>
                    </div>
                    <div class="gallery-count">5 صور</div>
                </div>
                <div style="background:rgba(0,229,255,.04);border:1px solid var(--border);border-radius:var(--radius);padding:18px 24px;margin-bottom:20px;font-size:.88rem;color:var(--text-muted);">
                    <strong style="color:var(--accent-cyan);">الأمر المستخدم:</strong>
                    <span style="direction:ltr;display:inline-block;font-style:italic;margin-right:8px;">"A glowing neural network brain made of light, floating in dark space, photorealistic, 8K"</span>
                </div>
                <div class="grid-regular" style="grid-template-columns:repeat(5,1fr);">
                    <div class="gi-r" style="min-height:160px;" onclick="openLb('lb-comp1')">
                        <img src="{{ asset('images/gallery/comp_midjourney.jpg') }}" alt="Midjourney comparison" style="width:100%; height:100%; object-fit:cover; position:absolute;">
                        <div class="img-badge" style="font-size:.65rem;">Midjourney</div>
                    </div>
                    <div class="gi-r" style="min-height:160px;" onclick="openLb('lb-comp2')">
                        <img src="{{ asset('images/gallery/comp_dalle.jpg') }}" alt="DALL·E comparison" style="width:100%; height:100%; object-fit:cover; position:absolute;">
                        <div class="img-badge violet" style="font-size:.65rem;">DALL·E 3</div>
                    </div>
                    <div class="gi-r" style="min-height:160px;" onclick="openLb('lb-comp3')">
                        <img src="{{ asset('images/gallery/comp_sd.jpg') }}" alt="Stable Diffusion comparison" style="width:100%; height:100%; object-fit:cover; position:absolute;">
                        <div class="img-badge pink" style="font-size:.65rem;">Stable Diff.</div>
                    </div>
                    <div class="gi-r" style="min-height:160px;" onclick="openLb('lb-comp4')">
                        <img src="{{ asset('images/gallery/comp_firefly.jpg') }}" alt="Firefly comparison" style="width:100%; height:100%; object-fit:cover; position:absolute;">
                        <div class="img-badge gold" style="font-size:.65rem;">Firefly</div>
                    </div>
                    <div class="gi-r" style="min-height:160px;" onclick="openLb('lb-comp5')">
                        <img src="{{ asset('images/gallery/comp_ideogram.jpg') }}" alt="Ideogram comparison" style="width:100%; height:100%; object-fit:cover; position:absolute;">
                        <div class="img-badge" style="font-size:.65rem;">Ideogram</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- LIGHTBOX (placeholder, will be populated dynamically) -->
    <div class="lightbox" id="lightbox" onclick="closeLb(event)">
        <div class="lb-card" id="lb-card">
            <div class="lb-close" onclick="document.getElementById('lightbox').classList.remove('open')">✕</div>
            <div class="lb-img" id="lb-img">
                <img id="lb-image" src="" alt="" style="width:100%; height:100%; object-fit:cover;">
            </div>
            <div class="lb-info">
                <div class="lb-tool" id="lb-tool">Midjourney v6</div>
                <div class="lb-title" id="lb-title">مدينة سايبربانك ليلية</div>
                <div class="lb-desc" id="lb-desc">صورة مُولَّدة بالذكاء الاصطناعي — مُعالجة ومحسَّنة بصيغة WEBP</div>
                <div class="lb-meta">
                    <span><strong id="lb-size">2048×2048</strong> px</span>
                    <span>صيغة: <strong id="lb-fmt">WEBP</strong></span>
                    <span>الوقت: <strong>~60 ثانية</strong></span>
                </div>
                <div class="prompt-box">
                    <div class="prompt-label">الأمر المستخدم (Prompt)</div>
                    <div class="prompt-text" id="lb-prompt"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Data for lightbox (matching each image)
    const lbData = {
        // Featured section
        lb1: { tool: 'Midjourney v6', title: 'مدينة سايبربانك ليلية', desc: 'مشهد ليلي لمدينة مستقبلية بإضاءة نيون — مُولَّد ومُعالج بصيغة WEBP عالية الجودة', size: '2048×2048', fmt: 'WEBP', prompt: 'Futuristic cyberpunk city at night, neon blue and red lighting, aerial view, rain reflections, ultra detailed, 4K --ar 16:9 --v 6', img: '{{ asset("images/gallery/futuristic_city.jpg") }}' },
        lb2: { tool: 'DALL·E 3', title: 'ناطحة سحاب زجاجية', desc: 'برج زجاجي ذو تصميم عضوي ملتوٍ — مُولَّد بـ DALL·E 3 ضمن ChatGPT', size: '1792×1792', fmt: 'WEBP', prompt: 'Futuristic glass skyscraper with organic twisted design, surrounded by clouds, photorealistic, architectural render', img: '{{ asset("images/gallery/glass_tower.jpg") }}' },
        lb3: { tool: 'Stable Diffusion XL', title: 'شارع حضري في المطر', desc: 'شارع مضاء بأنوار المدينة وانعكاساتها على الأرض المبللة — مُولَّد بـ SDXL', size: '1024×1024', fmt: 'WEBP', prompt: 'Rainy city street at night, neon reflections on wet pavement, photorealistic, cinematic lighting, 8K', img: '{{ asset("images/gallery/rainy_street.jpg") }}' },
        lb4: { tool: 'Adobe Firefly 3', title: 'حديقة عائمة فوق المدينة', desc: 'منظر خيالي لحديقة خضراء معلقة فوق ناطحات السحاب — مُولَّد بـ Adobe Firefly', size: '2048×2048', fmt: 'WEBP', prompt: 'Floating garden above a futuristic city, lush greenery, waterfalls, golden hour lighting, photorealistic', img: '{{ asset("images/gallery/floating_garden.jpg") }}' },
        lb5: { tool: 'Ideogram v2', title: 'ميناء فضائي تحت الماء', desc: 'محطة فضائية تحت الماء بتصميم هندسي مذهل — مُولَّد بـ Ideogram', size: '1536×1536', fmt: 'WEBP', prompt: 'Underwater space station with bioluminescent sea creatures, deep ocean, sci-fi architecture', img: '{{ asset("images/gallery/space_port.jpg") }}' },
        // Portraits (simplified for brevity - add as many as needed)
        lbp1: { tool: 'Midjourney v6', title: 'بورتريه كلاسيكي', desc: 'بورتريه بأسلوب النيوكلاسيك', size: '1024×1024', fmt: 'AVIF', prompt: 'Portrait of a young woman in neoclassical style, soft lighting, detailed face', img: '{{ asset("images/gallery/portrait1.jpg") }}' },
        lbp2: { tool: 'DALL·E 3', title: 'بورتريه انطباعي', desc: 'بورتريه بأسلوب انطباعي', size: '1024×1024', fmt: 'AVIF', prompt: 'Impressionist portrait, colorful brushstrokes, emotional expression', img: '{{ asset("images/gallery/portrait2.jpg") }}' },
        lbp3: { tool: 'SDXL + LoRA', title: 'شخصية فانتازيا', desc: 'شخصية خيالية مع إضاءة سينمائية', size: '1024×1024', fmt: 'WEBP', prompt: 'Fantasy elf warrior with glowing eyes, epic lighting, detailed armor', img: '{{ asset("images/gallery/fantasy_char.jpg") }}' },
        lbp4: { tool: 'Adobe Firefly 3', title: 'لوحة تجريدية', desc: 'لوحة تجريدية بألوان زاهية', size: '1024×1024', fmt: 'WEBP', prompt: 'Abstract painting with vibrant colors, fluid shapes, modern art', img: '{{ asset("images/gallery/abstract.jpg") }}' },
        lbp5: { tool: 'Midjourney v6', title: 'أزياء مستقبلية', desc: 'تصاميم أزياء خيالية', size: '1024×1024', fmt: 'AVIF', prompt: 'Futuristic fashion design, holographic fabrics, cyberpunk style', img: '{{ asset("images/gallery/future_fashion.jpg") }}' },
        lbp6: { tool: 'Ideogram v2', title: 'تصميم طباعي', desc: 'بوستر مع نصوص عربية', size: '1024×1024', fmt: 'WEBP', prompt: 'Typography poster with Arabic calligraphy, modern design', img: '{{ asset("images/gallery/typography.jpg") }}' },
        lbp7: { tool: 'DALL·E 3', title: 'طبيعة خيالية', desc: 'غابة بألوان ساحرة', size: '1024×1024', fmt: 'AVIF', prompt: 'Enchanted forest with bioluminescent plants, dreamlike atmosphere', img: '{{ asset("images/gallery/fantasy_nature.jpg") }}' },
        lbp8: { tool: 'SDXL + ControlNet', title: 'معمار داخلي', desc: 'تصميم داخلي بأسلوب باوهاوس', size: '1024×1024', fmt: 'WEBP', prompt: 'Bauhaus interior design, minimalist furniture, natural light', img: '{{ asset("images/gallery/interior.jpg") }}' },
        // Comparisons (add similarly)
        'lb-comp1': { tool: 'Midjourney v6', title: 'عصبونات مشعة (Midjourney)', desc: 'Midjourney result for the neural network prompt', size: '1024×1024', fmt: 'WEBP', prompt: 'A glowing neural network brain made of light, floating in dark space, photorealistic, 8K', img: '{{ asset("images/gallery/comp_midjourney.jpg") }}' },
        'lb-comp2': { tool: 'DALL·E 3', title: 'عصبونات مشعة (DALL·E 3)', desc: 'DALL·E 3 result', size: '1024×1024', fmt: 'WEBP', prompt: 'A glowing neural network brain made of light, floating in dark space, photorealistic, 8K', img: '{{ asset("images/gallery/comp_dalle.jpg") }}' },
        'lb-comp3': { tool: 'Stable Diffusion XL', title: 'عصبونات مشعة (SDXL)', desc: 'Stable Diffusion result', size: '1024×1024', fmt: 'AVIF', prompt: 'A glowing neural network brain made of light, floating in dark space, photorealistic, 8K', img: '{{ asset("images/gallery/comp_sd.jpg") }}' },
        'lb-comp4': { tool: 'Adobe Firefly 3', title: 'عصبونات مشعة (Firefly)', desc: 'Firefly result', size: '1024×1024', fmt: 'WEBP', prompt: 'A glowing neural network brain made of light, floating in dark space, photorealistic, 8K', img: '{{ asset("images/gallery/comp_firefly.jpg") }}' },
        'lb-comp5': { tool: 'Ideogram v2', title: 'عصبونات مشعة (Ideogram)', desc: 'Ideogram result', size: '1024×1024', fmt: 'AVIF', prompt: 'A glowing neural network brain made of light, floating in dark space, photorealistic, 8K', img: '{{ asset("images/gallery/comp_ideogram.jpg") }}' }
    };

    function openLb(id) {
        const data = lbData[id];
        if (!data) return;
        document.getElementById('lb-tool').textContent = data.tool;
        document.getElementById('lb-title').textContent = data.title;
        document.getElementById('lb-desc').textContent = data.desc;
        document.getElementById('lb-size').textContent = data.size;
        document.getElementById('lb-fmt').textContent = data.fmt;
        document.getElementById('lb-prompt').textContent = data.prompt;
        const lbImg = document.getElementById('lb-image');
        if (lbImg) lbImg.src = data.img;
        document.getElementById('lightbox').classList.add('open');
    }

    function closeLb(e) {
        if (e.target.id === 'lightbox') {
            document.getElementById('lightbox').classList.remove('open');
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.getElementById('lightbox').classList.remove('open');
        }
    });

    // Scroll reveal
    const reveals = document.querySelectorAll('.reveal');
    const io = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.08 });
    reveals.forEach(el => io.observe(el));
</script>
@endpush
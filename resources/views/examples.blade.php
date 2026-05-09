@extends('layouts.app')

@section('title', 'أمثلة حية | نظم الوسائط المتعددة')

@push('styles')
<style>
    /* ========== أنماط خاصة بصفحة الأمثلة فقط ========== */
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
        background: linear-gradient(135deg, var(--accent-violet) 0%, var(--accent-pink) 60%, var(--accent-cyan) 100%);
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
        margin-bottom: 12px;
    }
    .section-tag-el::before {
        content: '';
        width: 24px;
        height: 2px;
        border-radius: 2px;
    }
    .st-violet { color: var(--accent-violet); }
    .st-violet::before { background: var(--accent-violet); }
    .st-pink { color: var(--accent-pink); }
    .st-pink::before { background: var(--accent-pink); }
    .st-gold { color: var(--accent-gold); }
    .st-gold::before { background: var(--accent-gold); }

    .section-title {
        font-family: var(--font-display);
        font-size: clamp(1.5rem,3vw,2.2rem);
        font-weight: 800;
        margin-bottom: 14px;
    }
    .section-desc {
        color: var(--text-muted);
        font-size: .95rem;
    }

    /* Featured video */
    .featured-video {
        background: var(--bg-card);
        border: 1px solid rgba(155,92,246,.25);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--glow-violet);
        margin-bottom: 16px;
    }
    .vid-placeholder {
        width: 100%;
        aspect-ratio: 16/9;
        background: linear-gradient(135deg,#0b0f1e 0%,#111530 50%,#0c0e20 100%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 16px;
        position: relative;
        overflow: hidden;
    }
    .vid-placeholder::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at center, rgba(155,92,246,.08) 0%, transparent 70%);
    }
    .big-play {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(155,92,246,.2);
        border: 2px solid rgba(155,92,246,.5);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform .2s, background .2s;
        position: relative;
        z-index: 1;
    }
    .big-play:hover {
        transform: scale(1.1);
        background: rgba(155,92,246,.35);
    }
    .big-play svg {
        width: 30px;
        height: 30px;
        fill: var(--accent-violet);
        margin-right: -4px;
    }
    .vid-label-main {
        font-size: .9rem;
        color: rgba(255,255,255,.35);
        position: relative;
        z-index: 1;
    }
    .vid-duration {
        position: absolute;
        bottom: 14px;
        left: 16px;
        background: rgba(4,6,15,.75);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 4px 12px;
        font-size: .75rem;
        color: var(--text-muted);
        backdrop-filter: blur(8px);
    }
    .vid-quality {
        position: absolute;
        top: 14px;
        right: 14px;
        background: rgba(155,92,246,.2);
        border: 1px solid rgba(155,92,246,.3);
        border-radius: 8px;
        padding: 4px 12px;
        font-size: .72rem;
        color: var(--accent-violet);
        font-weight: 700;
    }
    .featured-video-info {
        padding: 28px 32px;
    }
    .fvi-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 16px;
    }
    .fvi-title {
        font-family: var(--font-display);
        font-size: 1.3rem;
        font-weight: 800;
    }
    .fvi-tool {
        font-size: .75rem;
        font-weight: 700;
        color: var(--accent-violet);
        letter-spacing: .08em;
        text-transform: uppercase;
        background: rgba(155,92,246,.1);
        border: 1px solid rgba(155,92,246,.2);
        padding: 4px 12px;
        border-radius: 20px;
        white-space: nowrap;
    }
    .fvi-desc {
        color: var(--text-muted);
        font-size: .9rem;
        line-height: 1.65;
        margin-bottom: 16px;
    }
    .fvi-tags {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    .ftag {
        background: rgba(255,255,255,.04);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 4px 12px;
        font-size: .78rem;
        color: var(--text-muted);
    }

    /* Timeline view */
    .timeline-view {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: 24px;
        padding: 40px 40px 32px;
        margin-top: 16px;
    }
    .tv-title {
        font-family: var(--font-display);
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 28px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .tv-phases {
        display: grid;
        grid-template-columns: repeat(5,1fr);
        gap: 0;
        position: relative;
    }
    .tv-phases::before {
        content: '';
        position: absolute;
        top: 28px;
        right: 10%;
        left: 10%;
        height: 2px;
        background: linear-gradient(90deg, var(--accent-violet), var(--accent-cyan));
    }
    .tv-phase {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
        z-index: 1;
    }
    .tv-dot {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        margin: 20px auto 16px;
        border: 2px solid var(--accent-violet);
        background: var(--bg-deep);
    }
    .tvd-active {
        background: var(--accent-violet);
        box-shadow: 0 0 14px rgba(155,92,246,.6);
    }
    .tv-time {
        font-size: .72rem;
        font-weight: 700;
        color: var(--accent-violet);
        margin-bottom: 6px;
    }
    .tv-label {
        font-size: .8rem;
        color: var(--text-muted);
        line-height: 1.4;
    }

    /* Video grid */
    .video-grid {
        display: grid;
        grid-template-columns: repeat(3,1fr);
        gap: 20px;
    }
    .vid-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        transition: transform .3s, box-shadow .3s, border-color .3s;
        cursor: pointer;
    }
    .vid-card:hover {
        transform: translateY(-5px);
    }
    .vc-violet:hover {
        border-color: rgba(155,92,246,.3);
        box-shadow: var(--glow-violet);
    }
    .vc-pink:hover {
        border-color: rgba(240,89,200,.3);
        box-shadow: var(--glow-pink);
    }
    .vc-cyan:hover {
        border-color: rgba(0,229,255,.3);
        box-shadow: var(--glow-cyan);
    }
    .vc-gold:hover {
        border-color: rgba(247,183,49,.3);
        box-shadow: 0 0 40px rgba(247,183,49,.3);
    }
    .vc-thumb {
        width: 100%;
        aspect-ratio: 16/9;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    .thumb-bg-v { background: linear-gradient(135deg,#0b0f1e,#13102a); }
    .thumb-bg-p { background: linear-gradient(135deg,#0b0f1e,#1a0f1e); }
    .thumb-bg-c { background: linear-gradient(135deg,#0b0f1e,#0e1828); }
    .thumb-bg-g { background: linear-gradient(135deg,#0b0f1e,#1a1508); }
    .play-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform .2s;
        position: relative;
        z-index: 1;
    }
    .vid-card:hover .play-circle {
        transform: scale(1.15);
    }
    .pc-v { background: rgba(155,92,246,.25); border: 2px solid rgba(155,92,246,.5); }
    .pc-p { background: rgba(240,89,200,.25); border: 2px solid rgba(240,89,200,.5); }
    .pc-c { background: rgba(0,229,255,.2); border: 2px solid rgba(0,229,255,.4); }
    .pc-g { background: rgba(247,183,49,.2); border: 2px solid rgba(247,183,49,.4); }
    .play-circle svg { width: 18px; height: 18px; margin-right: -3px; }
    .svg-v { fill: var(--accent-violet); }
    .svg-p { fill: var(--accent-pink); }
    .svg-c { fill: var(--accent-cyan); }
    .svg-g { fill: var(--accent-gold); }
    .vc-dur {
        position: absolute;
        bottom: 8px;
        left: 10px;
        background: rgba(4,6,15,.8);
        border-radius: 6px;
        padding: 3px 8px;
        font-size: .7rem;
        color: var(--text-muted);
        z-index: 1;
    }
    .vc-new {
        position: absolute;
        top: 8px;
        right: 10px;
        background: rgba(155,92,246,.3);
        border: 1px solid rgba(155,92,246,.4);
        border-radius: 6px;
        padding: 2px 8px;
        font-size: .68rem;
        color: var(--accent-violet);
        font-weight: 700;
        z-index: 1;
    }
    .vc-info { padding: 18px 20px 22px; }
    .vc-title { font-weight: 700; font-size: .97rem; margin-bottom: 6px; }
    .vc-tool {
        font-size: .74rem;
        font-weight: 700;
        letter-spacing: .06em;
        text-transform: uppercase;
        margin-bottom: 8px;
    }
    .ct-v { color: var(--accent-violet); }
    .ct-p { color: var(--accent-pink); }
    .ct-c { color: var(--accent-cyan); }
    .ct-g { color: var(--accent-gold); }
    .vc-desc {
        color: var(--text-muted);
        font-size: .84rem;
        line-height: 1.55;
    }
    .vc-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px solid rgba(255,255,255,.04);
    }
    .vc-meta {
        font-size: .76rem;
        color: var(--text-muted);
    }

    /* Audio section */
    .audio-grid {
        display: grid;
        grid-template-columns: repeat(2,1fr);
        gap: 20px;
    }
    .audio-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 28px 28px 24px;
        transition: transform .3s, border-color .3s;
    }
    .audio-card:hover {
        transform: translateY(-3px);
    }
    .ac-pink:hover { border-color: rgba(240,89,200,.3); }
    .ac-gold:hover { border-color: rgba(247,183,49,.3); }
    .audio-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 18px;
    }
    .audio-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    .ai-pink { background: rgba(240,89,200,.1); }
    .ai-gold { background: rgba(247,183,49,.1); }
    .ai-violet { background: rgba(155,92,246,.1); }
    .ai-cyan { background: rgba(0,229,255,.1); }
    .audio-title {
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 3px;
    }
    .audio-tool {
        font-size: .74rem;
        font-weight: 700;
        letter-spacing: .06em;
        text-transform: uppercase;
    }
    .waveform {
        height: 56px;
        background: rgba(255,255,255,.03);
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 8px 14px;
        display: flex;
        align-items: center;
        gap: 2px;
        margin-bottom: 16px;
        overflow: hidden;
    }
    .wave-bar {
        flex: 1;
        border-radius: 2px;
        background: var(--accent-violet);
        opacity: .3;
        animation: wavePulse 1.4s ease-in-out infinite;
    }
    .waveform.pink .wave-bar { background: var(--accent-pink); }
    .waveform.gold .wave-bar { background: var(--accent-gold); }
    .waveform.cyan .wave-bar { background: var(--accent-cyan); }
    @keyframes wavePulse {
        0%,100% { transform: scaleY(.4); }
        50% { transform: scaleY(1); }
    }
    .audio-player {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .play-btn-sm {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        transition: transform .2s;
        background: transparent;
    }
    .play-btn-sm:hover {
        transform: scale(1.1);
    }
    .pb-violet { background: rgba(155,92,246,.2); border: 1px solid rgba(155,92,246,.4); }
    .pb-pink { background: rgba(240,89,200,.2); border: 1px solid rgba(240,89,200,.4); }
    .pb-gold { background: rgba(247,183,49,.2); border: 1px solid rgba(247,183,49,.4); }
    .pb-cyan { background: rgba(0,229,255,.15); border: 1px solid rgba(0,229,255,.35); }
    .play-btn-sm svg { width: 15px; height: 15px; margin-right: -2px; }
    .progress-bar {
        flex: 1;
        height: 4px;
        background: rgba(255,255,255,.08);
        border-radius: 2px;
        position: relative;
        cursor: pointer;
    }
    .progress-fill {
        height: 100%;
        border-radius: 2px;
        width: 0%;
    }
    .pf-violet { background: var(--accent-violet); }
    .pf-pink { background: var(--accent-pink); }
    .pf-gold { background: var(--accent-gold); }
    .pf-cyan { background: var(--accent-cyan); }
    .audio-dur {
        font-size: .75rem;
        color: var(--text-muted);
        white-space: nowrap;
    }
    .audio-desc {
        color: var(--text-muted);
        font-size: .85rem;
        line-height: 1.6;
        margin-top: 14px;
        padding-top: 14px;
        border-top: 1px solid rgba(255,255,255,.04);
    }

    /* Responsive */
    @media (max-width: 900px) {
        .video-grid { grid-template-columns: 1fr 1fr; }
        .audio-grid { grid-template-columns: 1fr; }
        .tv-phases { grid-template-columns: 1fr; }
        .tv-phases::before { display: none; }
    }
    @media (max-width: 600px) {
        .video-grid { grid-template-columns: 1fr; }
        .timeline-view { padding: 24px; }
    }
</style>
@endpush

@section('content')
    <!-- PAGE HERO -->
    <div class="page-hero">
        <div class="page-tag"><span></span> فيديو · صوت · موسيقى</div>
        <h1 class="page-title">أمثلة <span class="grad-text">حية ومتنوعة</span></h1>
        <p class="page-sub">مقاطع تعليمية وعروض تطبيقية لمخرجات أدوات الذكاء الاصطناعي التوليدي في الوسائط المتعددة</p>
    </div>

    <!-- FEATURED VIDEO SECTION -->
    <section>
        <div class="section-inner" style="padding-top:0;">
            <div class="reveal">
                <span class="section-tag-el st-violet">الفيديو المميز</span>
                <h2 class="section-title">مقدمة شاملة إلى نماذج الانتشار</h2>
            </div>
            <div class="featured-video reveal" style="transition-delay:.08s">
                {{-- ضع ملف الفيديو في public/videos/featured.mp4 --}}
                <div class="vid-placeholder">
                    <video width="100%" height="100%" style="object-fit:cover; position:absolute; top:0; left:0;" controls>
                        <source src="{{ asset('videos/featured.mp4') }}" type="video/mp4">
                        متصفحك لا يدعم عرض الفيديو.
                    </video>
                    <div class="vid-quality">1080p HD</div>
                    <div class="vid-duration">⏱ 08:42</div>
                </div>
                <div class="featured-video-info">
                    <div class="fvi-header">
                        <div class="fvi-title">كيف تعمل نماذج الانتشار؟ — شرح مرئي تفصيلي</div>
                        <div class="fvi-tool">Runway Gen-3</div>
                    </div>
                    <p class="fvi-desc">فيديو تعليمي يشرح بالرسوم المتحركة كيف تُحوّل نماذج الانتشار الضوضاء العشوائية إلى صور إبداعية مذهلة، خطوةً بخطوة. يتضمن شروحات نصية متزامنة ومقاطع صوتية مصاحبة.</p>
                    <div class="fvi-tags">
                        <div class="ftag">🎬 مونتاج رقمي</div>
                        <div class="ftag">🔊 تعليق صوتي</div>
                        <div class="ftag">📝 شروحات نصية متزامنة</div>
                        <div class="ftag">✨ رسوم متحركة</div>
                    </div>
                </div>
            </div>

            <!-- PRODUCTION TIMELINE -->
            <div class="timeline-view reveal" style="transition-delay:.15s">
                <div class="tv-title">🎬 مراحل إنتاج الفيديو التعليمي</div>
                <div class="tv-phases">
                    <div class="tv-phase"><div class="tv-dot tvd-active"></div><div class="tv-time">المرحلة ١</div><div class="tv-label">كتابة السيناريو والنص</div></div>
                    <div class="tv-phase"><div class="tv-dot tvd-active"></div><div class="tv-time">المرحلة ٢</div><div class="tv-label">توليد الصور بالذكاء الاصطناعي</div></div>
                    <div class="tv-phase"><div class="tv-dot tvd-active"></div><div class="tv-time">المرحلة ٣</div><div class="tv-label">تسجيل التعليق الصوتي</div></div>
                    <div class="tv-phase"><div class="tv-dot tvd-active"></div><div class="tv-time">المرحلة ٤</div><div class="tv-label">المونتاج والمزامنة</div></div>
                    <div class="tv-phase"><div class="tv-dot tvd-active"></div><div class="tv-time">المرحلة ٥</div><div class="tv-label">التصدير بدقة 1080p</div></div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- VIDEO GRID SECTION -->
    <section>
        <div class="section-inner">
            <div class="reveal" style="margin-bottom:36px;">
                <span class="section-tag-el st-violet">مقاطع الفيديو</span>
                <h2 class="section-title">مقاطع تعليمية وعروض تطبيقية</h2>
                <p class="section-desc">مصممة خصيصاً للموقع باستخدام أدوات المونتاج الرقمي</p>
            </div>
            <div class="video-grid">
                {{-- ضع ملفات الفيديو في public/videos/ --}}
                <div class="vid-card vc-violet reveal">
                    <div class="vc-thumb thumb-bg-v">
                        <video width="100%" height="100%" style="object-fit:cover; position:absolute; top:0; left:0;" controls>
                            <source src="{{ asset('videos/diffusion_intro.mp4') }}" type="video/mp4">
                        </video>
                        <div class="play-circle pc-v"><svg viewBox="0 0 24 24" class="svg-v"><path d="M8 5v14l11-7z"/></svg></div>
                        <div class="vc-dur">⏱ 04:15</div>
                        <div class="vc-new">جديد</div>
                    </div>
                    <div class="vc-info">
                        <div class="vc-tool ct-v">Runway Gen-3</div>
                        <div class="vc-title">مقدمة إلى نماذج الانتشار</div>
                        <p class="vc-desc">شرح مرئي بالرسوم المتحركة لكيفية عمل Diffusion Models في توليد الصور خطوةً بخطوة.</p>
                        <div class="vc-footer">
                            <div class="vc-meta">1080p · MP4</div>
                            <div class="vc-meta">🎵 موسيقى AI</div>
                        </div>
                    </div>
                </div>

                <div class="vid-card vc-pink reveal" style="transition-delay:.07s">
                    <div class="vc-thumb thumb-bg-p">
                        <video width="100%" height="100%" style="object-fit:cover; position:absolute; top:0; left:0;" controls>
                            <source src="{{ asset('videos/elevenlabs_voice.mp4') }}" type="video/mp4">
                        </video>
                        <div class="play-circle pc-p"><svg viewBox="0 0 24 24" class="svg-p"><path d="M8 5v14l11-7z"/></svg></div>
                        <div class="vc-dur">⏱ 03:30</div>
                    </div>
                    <div class="vc-info">
                        <div class="vc-tool ct-p">ElevenLabs + Premiere</div>
                        <div class="vc-title">توليد الصوت البشري بـ ElevenLabs</div>
                        <p class="vc-desc">عرض تطبيقي لطريقة استنساخ الأصوات وتوليد تعليق صوتي احترافي باللغة العربية.</p>
                        <div class="vc-footer">
                            <div class="vc-meta">1080p · MP4</div>
                            <div class="vc-meta">🔊 TTS عربي</div>
                        </div>
                    </div>
                </div>

                <div class="vid-card vc-cyan reveal" style="transition-delay:.14s">
                    <div class="vc-thumb thumb-bg-c">
                        <video width="100%" height="100%" style="object-fit:cover; position:absolute; top:0; left:0;" controls>
                            <source src="{{ asset('videos/image_to_video.mp4') }}" type="video/mp4">
                        </video>
                        <div class="play-circle pc-c"><svg viewBox="0 0 24 24" class="svg-c"><path d="M8 5v14l11-7z"/></svg></div>
                        <div class="vc-dur">⏱ 05:00</div>
                    </div>
                    <div class="vc-info">
                        <div class="vc-tool ct-c">Runway Gen-3</div>
                        <div class="vc-title">من صورة إلى فيديو متحرك</div>
                        <p class="vc-desc">عرض لقدرات Runway Gen-3 في تحويل صورة ثابتة إلى مقطع فيديو سينمائي احترافي.</p>
                        <div class="vc-footer">
                            <div class="vc-meta">1080p · MP4</div>
                            <div class="vc-meta">🖼️ Image-to-Video</div>
                        </div>
                    </div>
                </div>

                <div class="vid-card vc-gold reveal" style="transition-delay:.21s">
                    <div class="vc-thumb thumb-bg-g">
                        <video width="100%" height="100%" style="object-fit:cover; position:absolute; top:0; left:0;" controls>
                            <source src="{{ asset('videos/suno_music.mp4') }}" type="video/mp4">
                        </video>
                        <div class="play-circle pc-g"><svg viewBox="0 0 24 24" class="svg-g"><path d="M8 5v14l11-7z"/></svg></div>
                        <div class="vc-dur">⏱ 06:20</div>
                    </div>
                    <div class="vc-info">
                        <div class="vc-tool ct-g">Suno AI + DaVinci Resolve</div>
                        <div class="vc-title">الموسيقى التوليدية في الوسائط</div>
                        <p class="vc-desc">كيف تُولّد Suno AI مقطوعات موسيقية كاملة لمشاريع الوسائط المتعددة.</p>
                        <div class="vc-footer">
                            <div class="vc-meta">1080p · MP4</div>
                            <div class="vc-meta">🎵 AI Music</div>
                        </div>
                    </div>
                </div>

                <div class="vid-card vc-violet reveal" style="transition-delay:.28s">
                    <div class="vc-thumb thumb-bg-v">
                        <video width="100%" height="100%" style="object-fit:cover; position:absolute; top:0; left:0;" controls>
                            <source src="{{ asset('videos/workflow_midjourney_runway.mp4') }}" type="video/mp4">
                        </video>
                        <div class="play-circle pc-v"><svg viewBox="0 0 24 24" class="svg-v"><path d="M8 5v14l11-7z"/></svg></div>
                        <div class="vc-dur">⏱ 07:45</div>
                    </div>
                    <div class="vc-info">
                        <div class="vc-tool ct-v">Midjourney + Runway</div>
                        <div class="vc-title">سير عمل متكامل: من الفكرة للفيديو</div>
                        <p class="vc-desc">نموذج كامل يشرح سير العمل من توليد الصور بـ Midjourney وحتى تحريكها بـ Runway.</p>
                        <div class="vc-footer">
                            <div class="vc-meta">1080p · MP4</div>
                            <div class="vc-meta">🔄 Workflow</div>
                        </div>
                    </div>
                </div>

                <div class="vid-card vc-pink reveal" style="transition-delay:.35s">
                    <div class="vc-thumb thumb-bg-p">
                        <video width="100%" height="100%" style="object-fit:cover; position:absolute; top:0; left:0;" controls>
                            <source src="{{ asset('videos/firefly_editing.mp4') }}" type="video/mp4">
                        </video>
                        <div class="play-circle pc-p"><svg viewBox="0 0 24 24" class="svg-p"><path d="M8 5v14l11-7z"/></svg></div>
                        <div class="vc-dur">⏱ 03:55</div>
                    </div>
                    <div class="vc-info">
                        <div class="vc-tool ct-p">Adobe Firefly + Premiere</div>
                        <div class="vc-title">التحرير الذكي مع Adobe Firefly</div>
                        <p class="vc-desc">استخدام Firefly داخل Premiere Pro لتوليد خلفيات وتأثيرات بصرية في المونتاج.</p>
                        <div class="vc-footer">
                            <div class="vc-meta">1080p · MP4</div>
                            <div class="vc-meta">✂️ Video Editing</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- AUDIO SECTION -->
    <section>
        <div class="section-inner">
            <div class="reveal" style="margin-bottom:36px;">
                <span class="section-tag-el st-pink">مقاطع صوتية</span>
                <h2 class="section-title">نماذج صوتية مُولَّدة بالذكاء الاصطناعي</h2>
                <p class="section-desc">تعليقات صوتية وموسيقى مصاحبة — مُولَّدة بأدوات AI وجاهزة للاستخدام</p>
            </div>
            <div class="audio-grid">
                {{-- ضع ملفات الصوت في public/audio/ --}}
                <div class="audio-card ac-pink reveal">
                    <div class="audio-header">
                        <div class="audio-icon ai-pink">🎙️</div>
                        <div>
                            <div class="audio-title">تعليق صوتي عربي — مقدمة الموقع</div>
                            <div class="audio-tool ct-p">ElevenLabs · Arabic Voice</div>
                        </div>
                    </div>
                    <div class="waveform pink">
                        {{-- Wave bars تزيينية --}}
                        <div class="wave-bar" style="height:30%;animation-delay:0s"></div><div class="wave-bar" style="height:70%;animation-delay:.1s"></div><div class="wave-bar" style="height:45%;animation-delay:.2s"></div><div class="wave-bar" style="height:90%;animation-delay:.05s"></div><div class="wave-bar" style="height:60%;animation-delay:.15s"></div><div class="wave-bar" style="height:35%;animation-delay:.25s"></div><div class="wave-bar" style="height:80%;animation-delay:.08s"></div><div class="wave-bar" style="height:50%;animation-delay:.18s"></div><div class="wave-bar" style="height:65%;animation-delay:.03s"></div><div class="wave-bar" style="height:40%;animation-delay:.22s"></div><div class="wave-bar" style="height:75%;animation-delay:.12s"></div><div class="wave-bar" style="height:55%;animation-delay:.06s"></div><div class="wave-bar" style="height:85%;animation-delay:.16s"></div><div class="wave-bar" style="height:30%;animation-delay:.26s"></div><div class="wave-bar" style="height:70%;animation-delay:.09s"></div><div class="wave-bar" style="height:45%;animation-delay:.19s"></div><div class="wave-bar" style="height:95%;animation-delay:.04s"></div><div class="wave-bar" style="height:50%;animation-delay:.14s"></div><div class="wave-bar" style="height:65%;animation-delay:.24s"></div><div class="wave-bar" style="height:40%;animation-delay:.07s"></div>
                    </div>
                    <div class="audio-player">
                        <audio id="audio1" src="{{ asset('audio/arabic_intro.mp3') }}" preload="metadata"></audio>
                        <button class="play-btn-sm pb-pink" onclick="toggleAudio('audio1', this)"><svg viewBox="0 0 24 24" class="svg-p"><path d="M8 5v14l11-7z"/></svg></button>
                        <div class="progress-bar" onclick="seekAudio('audio1', event)"><div class="progress-fill pf-pink" id="progress1" style="width:0%"></div></div>
                        <div class="audio-dur" id="duration1">01:24</div>
                    </div>
                    <p class="audio-desc">تعليق صوتي باللغة العربية يُقدّم مفهوم الذكاء الاصطناعي التوليدي — مُولَّد بـ ElevenLabs بصوت بشري طبيعي.</p>
                </div>

                <div class="audio-card ac-gold reveal" style="transition-delay:.08s">
                    <div class="audio-header">
                        <div class="audio-icon ai-gold">🎵</div>
                        <div>
                            <div class="audio-title">موسيقى خلفية — أجواء تقنية</div>
                            <div class="audio-tool ct-g">Suno AI · Ambient Tech</div>
                        </div>
                    </div>
                    <div class="waveform gold">
                        <div class="wave-bar" style="height:50%;animation-delay:.1s"></div><div class="wave-bar" style="height:30%;animation-delay:0s"></div><div class="wave-bar" style="height:80%;animation-delay:.2s"></div><div class="wave-bar" style="height:40%;animation-delay:.05s"></div><div class="wave-bar" style="height:65%;animation-delay:.15s"></div><div class="wave-bar" style="height:90%;animation-delay:.25s"></div><div class="wave-bar" style="height:45%;animation-delay:.08s"></div><div class="wave-bar" style="height:70%;animation-delay:.18s"></div><div class="wave-bar" style="height:35%;animation-delay:.03s"></div><div class="wave-bar" style="height:85%;animation-delay:.22s"></div><div class="wave-bar" style="height:55%;animation-delay:.12s"></div><div class="wave-bar" style="height:75%;animation-delay:.06s"></div><div class="wave-bar" style="height:40%;animation-delay:.16s"></div><div class="wave-bar" style="height:60%;animation-delay:.26s"></div><div class="wave-bar" style="height:95%;animation-delay:.09s"></div><div class="wave-bar" style="height:50%;animation-delay:.19s"></div><div class="wave-bar" style="height:30%;animation-delay:.04s"></div><div class="wave-bar" style="height:70%;animation-delay:.14s"></div><div class="wave-bar" style="height:45%;animation-delay:.24s"></div><div class="wave-bar" style="height:80%;animation-delay:.07s"></div>
                    </div>
                    <div class="audio-player">
                        <audio id="audio2" src="{{ asset('audio/ambient_tech.mp3') }}" preload="metadata"></audio>
                        <button class="play-btn-sm pb-gold" onclick="toggleAudio('audio2', this)"><svg viewBox="0 0 24 24" class="svg-g"><path d="M8 5v14l11-7z"/></svg></button>
                        <div class="progress-bar" onclick="seekAudio('audio2', event)"><div class="progress-fill pf-gold" id="progress2" style="width:0%"></div></div>
                        <div class="audio-dur" id="duration2">02:30</div>
                    </div>
                    <p class="audio-desc">مقطع موسيقي إلكتروني تحيطي مُولَّد بـ Suno AI بأسلوب "Ambient Tech" مناسب لخلفية الموقع.</p>
                </div>

                <div class="audio-card reveal" style="transition-delay:.16s">
                    <div class="audio-header">
                        <div class="audio-icon ai-violet">🎼</div>
                        <div>
                            <div class="audio-title">مؤثرات صوتية — انتقالات الموقع</div>
                            <div class="audio-tool ct-v">AudioCraft · SFX</div>
                        </div>
                    </div>
                    <div class="waveform">
                        <div class="wave-bar" style="height:20%;animation-delay:.05s"></div><div class="wave-bar" style="height:60%;animation-delay:.15s"></div><div class="wave-bar" style="height:90%;animation-delay:.0s"></div><div class="wave-bar" style="height:40%;animation-delay:.2s"></div><div class="wave-bar" style="height:70%;animation-delay:.1s"></div><div class="wave-bar" style="height:30%;animation-delay:.25s"></div><div class="wave-bar" style="height:50%;animation-delay:.08s"></div><div class="wave-bar" style="height:80%;animation-delay:.18s"></div><div class="wave-bar" style="height:35%;animation-delay:.03s"></div><div class="wave-bar" style="height:65%;animation-delay:.22s"></div><div class="wave-bar" style="height:45%;animation-delay:.12s"></div><div class="wave-bar" style="height:85%;animation-delay:.06s"></div><div class="wave-bar" style="height:25%;animation-delay:.16s"></div><div class="wave-bar" style="height:55%;animation-delay:.26s"></div><div class="wave-bar" style="height:75%;animation-delay:.09s"></div><div class="wave-bar" style="height:40%;animation-delay:.19s"></div><div class="wave-bar" style="height:95%;animation-delay:.04s"></div><div class="wave-bar" style="height:30%;animation-delay:.14s"></div><div class="wave-bar" style="height:60%;animation-delay:.24s"></div><div class="wave-bar" style="height:50%;animation-delay:.07s"></div>
                    </div>
                    <div class="audio-player">
                        <audio id="audio3" src="{{ asset('audio/sfx_transitions.mp3') }}" preload="metadata"></audio>
                        <button class="play-btn-sm pb-violet" onclick="toggleAudio('audio3', this)"><svg viewBox="0 0 24 24" class="svg-v"><path d="M8 5v14l11-7z"/></svg></button>
                        <div class="progress-bar" onclick="seekAudio('audio3', event)"><div class="progress-fill pf-violet" id="progress3" style="width:0%"></div></div>
                        <div class="audio-dur" id="duration3">00:08</div>
                    </div>
                    <p class="audio-desc">مؤثرات صوتية قصيرة مُولَّدة بـ AudioCraft من Meta — مستخدمة في انتقالات أقسام الموقع.</p>
                </div>

                <div class="audio-card reveal" style="transition-delay:.24s">
                    <div class="audio-header">
                        <div class="audio-icon ai-cyan">🔬</div>
                        <div>
                            <div class="audio-title">شرح صوتي — كيف تعمل GANs</div>
                            <div class="audio-tool ct-c">ElevenLabs · Educational</div>
                        </div>
                    </div>
                    <div class="waveform cyan">
                        <div class="wave-bar" style="height:55%;animation-delay:.1s"></div><div class="wave-bar" style="height:35%;animation-delay:0s"></div><div class="wave-bar" style="height:75%;animation-delay:.2s"></div><div class="wave-bar" style="height:90%;animation-delay:.05s"></div><div class="wave-bar" style="height:45%;animation-delay:.15s"></div><div class="wave-bar" style="height:65%;animation-delay:.25s"></div><div class="wave-bar" style="height:80%;animation-delay:.08s"></div><div class="wave-bar" style="height:30%;animation-delay:.18s"></div><div class="wave-bar" style="height:50%;animation-delay:.03s"></div><div class="wave-bar" style="height:70%;animation-delay:.22s"></div><div class="wave-bar" style="height:40%;animation-delay:.12s"></div><div class="wave-bar" style="height:85%;animation-delay:.06s"></div><div class="wave-bar" style="height:60%;animation-delay:.16s"></div><div class="wave-bar" style="height:25%;animation-delay:.26s"></div><div class="wave-bar" style="height:95%;animation-delay:.09s"></div><div class="wave-bar" style="height:55%;animation-delay:.19s"></div><div class="wave-bar" style="height:40%;animation-delay:.04s"></div><div class="wave-bar" style="height:70%;animation-delay:.14s"></div><div class="wave-bar" style="height:30%;animation-delay:.24s"></div><div class="wave-bar" style="height:80%;animation-delay:.07s"></div>
                    </div>
                    <div class="audio-player">
                        <audio id="audio4" src="{{ asset('audio/gans_explanation.mp3') }}" preload="metadata"></audio>
                        <button class="play-btn-sm pb-cyan" onclick="toggleAudio('audio4', this)"><svg viewBox="0 0 24 24" class="svg-c"><path d="M8 5v14l11-7z"/></svg></button>
                        <div class="progress-bar" onclick="seekAudio('audio4', event)"><div class="progress-fill pf-cyan" id="progress4" style="width:0%"></div></div>
                        <div class="audio-dur" id="duration4">02:10</div>
                    </div>
                    <p class="audio-desc">شرح تعليمي صوتي مُولَّد بـ ElevenLabs يشرح كيفية عمل النماذج التوليدية التنافسية (GANs) بأسلوب مبسط.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Simple audio player controls
    let currentAudio = null;
    let currentButton = null;

    function toggleAudio(audioId, button) {
        const audio = document.getElementById(audioId);
        const svg = button.querySelector('svg');
        if (!audio) return;

        if (currentAudio && currentAudio !== audio) {
            currentAudio.pause();
            if (currentButton) {
                const oldSvg = currentButton.querySelector('svg');
                if (oldSvg) oldSvg.innerHTML = '<path d="M8 5v14l11-7z"/>';
            }
        }

        if (audio.paused) {
            audio.play();
            svg.innerHTML = '<path d="M5 3l14 9-14 9V3z"/>'; // pause icon
            currentAudio = audio;
            currentButton = button;
            updateProgress(audioId);
        } else {
            audio.pause();
            svg.innerHTML = '<path d="M8 5v14l11-7z"/>';
            currentAudio = null;
            currentButton = null;
        }
    }

    function updateProgress(audioId) {
        const audio = document.getElementById(audioId);
        const progressFill = document.getElementById('progress' + audioId.slice(-1));
        if (!audio || !progressFill) return;
        const update = () => {
            if (!audio.paused) {
                const percent = (audio.currentTime / audio.duration) * 100;
                progressFill.style.width = percent + '%';
                requestAnimationFrame(update);
            }
        };
        audio.addEventListener('timeupdate', () => {
            const percent = (audio.currentTime / audio.duration) * 100;
            progressFill.style.width = percent + '%';
        });
    }

    function seekAudio(audioId, event) {
        const audio = document.getElementById(audioId);
        const progressBar = event.currentTarget;
        const rect = progressBar.getBoundingClientRect();
        const clickX = event.clientX - rect.left;
        const width = rect.width;
        const percent = clickX / width;
        if (audio && audio.duration) {
            audio.currentTime = percent * audio.duration;
        }
    }

    // Initialize durations display
    document.querySelectorAll('audio').forEach(audio => {
        audio.addEventListener('loadedmetadata', () => {
            const minutes = Math.floor(audio.duration / 60);
            const seconds = Math.floor(audio.duration % 60);
            const durationStr = `${minutes}:${seconds.toString().padStart(2,'0')}`;
            const parent = audio.closest('.audio-player');
            if (parent) {
                const durSpan = parent.querySelector('.audio-dur');
                if (durSpan) durSpan.textContent = durationStr;
            }
        });
    });
</script>
@endpush
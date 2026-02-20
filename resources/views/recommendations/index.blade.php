@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/comments_style.css') }}">

@php \Carbon\Carbon::setLocale('es'); @endphp

<main class="comm-bg">

    {{-- ══ HERO BANNER ══ --}}
    <div class="comm-hero">
        <div class="comm-hero__inner">
            <div class="comm-hero__icon"><i class="fas fa-seedling"></i></div>
            <div>
                <h1 class="comm-hero__title">Comunidad AgroFinanzas</h1>
                <p class="comm-hero__sub">Comparte experiencias, resuelve dudas y aprende junto a otros agricultores</p>
            </div>
        </div>
        <div class="comm-hero__stats">
            <div class="comm-stat">
                <i class="fas fa-comments"></i>
                <span>{{ count($recommendations) }}</span>
                <small>Publicaciones</small>
            </div>
            <div class="comm-stat">
                <i class="fas fa-users"></i>
                @php
                    $uniqueUsers = count(array_unique(array_filter(array_map(
                        fn($r) => $r['user']['id'] ?? null,
                        is_array($recommendations) ? $recommendations : $recommendations->toArray()
                    ))));
                @endphp
                <span>{{ $uniqueUsers }}</span>
                <small>Participantes</small>
            </div>
        </div>
    </div>

    <div class="comm-layout">

        {{-- ══ COLUMNA PRINCIPAL ══ --}}
        <div class="comm-main">

            {{-- ── FORMULARIO NUEVA PUBLICACIÓN ── --}}
            <div class="comm-compose">
                <div class="comm-compose__header">
                    <img src="{{ session('user.profile_photo') ?: asset('img/profile.png') }}"
                         class="comm-compose__avatar" alt="Tu foto">
                    <span class="comm-compose__prompt">¿Qué quieres compartir hoy?</span>
                </div>

                <form action="{{ route('recommendations.store') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="comm-compose__form"
                      id="mainCommentForm">
                    @csrf

                    <textarea name="text" class="comm-textarea"
                              placeholder="Escribe tu recomendación, duda u opinión con la comunidad..." required></textarea>

                    <div class="comm-compose__footer">

                        {{-- Selector de categoría --}}
                        <div class="cat-selector">
                            <button type="button" class="cat-btn active" data-val="recomendacion" onclick="selectCat(this)">
                                <span class="cat-dot cat-dot--recomendacion"></span> Recomendación
                            </button>
                            <button type="button" class="cat-btn" data-val="opinion" onclick="selectCat(this)">
                                <span class="cat-dot cat-dot--opinion"></span> Opinión
                            </button>
                            <button type="button" class="cat-btn" data-val="duda" onclick="selectCat(this)">
                                <span class="cat-dot cat-dot--duda"></span> Duda
                            </button>
                            <button type="button" class="cat-btn" data-val="problema" onclick="selectCat(this)">
                                <span class="cat-dot cat-dot--problema"></span> Problema
                            </button>
                        </div>
                        <input type="hidden" name="category" id="categoryInput" value="recomendacion">

                        {{-- Media + Submit --}}
                        <div class="comm-compose__actions">
                            <input type="file" name="media_file" id="mediaFileInput"
                                   accept="image/*,video/*" style="display:none"
                                   onchange="previewMedia(this, 'mainPreview', 'mediaFileName')">

                            <button type="button" class="comm-media-btn"
                                    onclick="document.getElementById('mediaFileInput').click()">
                                <i class="fas fa-image"></i>
                                <span id="mediaFileName">Adjuntar</span>
                            </button>

                            <button type="submit" class="comm-submit-btn">
                                <i class="fas fa-paper-plane"></i> Publicar
                            </button>
                        </div>
                    </div>

                    {{-- Preview --}}
                    <div id="mainPreview" class="comm-preview" style="display:none">
                        <button type="button" class="comm-preview__remove"
                                onclick="removeMedia('mediaFileInput','mainPreview','mediaFileName')">
                            <i class="fas fa-xmark"></i> Quitar
                        </button>
                    </div>

                    @error('media_file')
                        <span class="comm-error">{{ $message }}</span>
                    @enderror
                </form>
            </div>

            {{-- ── FILTROS ── --}}
            <div class="comm-filters">
                <span class="comm-filters__label"><i class="fas fa-filter"></i> Filtrar:</span>
                <button class="filter-btn active" onclick="filterPosts('all', this)">Todos</button>
                <button class="filter-btn" onclick="filterPosts('recomendacion', this)">Recomendaciones</button>
                <button class="filter-btn" onclick="filterPosts('opinion', this)">Opiniones</button>
                <button class="filter-btn" onclick="filterPosts('duda', this)">Dudas</button>
                <button class="filter-btn" onclick="filterPosts('problema', this)">Problemas</button>
            </div>

            {{-- ── LISTA DE PUBLICACIONES ── --}}
            <div class="comm-feed" id="commFeed">
                @forelse ($recommendations as $rec)

                    @php
                        $recDate = \Carbon\Carbon::parse($rec['created_at'] ?? $rec['date'] ?? now())
                            ->setTimezone('America/Bogota');
                    @endphp

                    <article class="comm-post" data-category="{{ $rec['category'] ?? 'recomendacion' }}">

                        {{-- Cabecera del post --}}
                        <div class="comm-post__head">
                            <div class="comm-post__author">
                                @php $authorPhoto = $rec['user']['profile_photo'] ?? null; @endphp
                                <img src="{{ $authorPhoto ?: asset('img/profile.png') }}"
                                     class="comm-avatar"
                                     onerror="if(!this.dataset.fb){this.dataset.fb='1';this.src='{{ asset('img/profile.png') }}'}">
                                <div class="comm-post__author-info">
                                    <span class="comm-post__author-name">{{ $rec['user']['name'] ?? 'Anónimo' }}</span>
                                    <span class="comm-post__date">
                                        <i class="fas fa-clock"></i>
                                        {{ $recDate->diffForHumans() }}
                                        <span class="comm-post__date-full">
                                            · {{ $recDate->format('d M Y, H:i') }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <span class="comm-tag comm-tag--{{ $rec['category'] ?? 'recomendacion' }}">
                                {{ ucfirst($rec['category'] ?? 'Recomendación') }}
                            </span>
                        </div>

                        {{-- Texto --}}
                        <p class="comm-post__text">{{ $rec['text'] }}</p>

                        {{-- Media --}}
                        @if (!empty($rec['media_url']))
                            <div class="comm-post__media">
                                @if (($rec['media_type'] ?? '') === 'video')
                                    <video controls class="comm-media-file">
                                        <source src="{{ $rec['media_url'] }}" type="video/mp4">
                                        Tu navegador no soporta video.
                                    </video>
                                @else
                                    <img src="{{ $rec['media_url'] }}"
                                         class="comm-media-file comm-media-file--img"
                                         alt="Imagen adjunta"
                                         onclick="openLightbox(this.src)">
                                @endif
                            </div>
                        @endif

                        {{-- Footer: contador de respuestas + botón --}}
                        <div class="comm-post__foot">
                            <span class="comm-reply-count">
                                <i class="fas fa-reply"></i>
                                {{ count($rec['replies'] ?? []) }}
                                {{ count($rec['replies'] ?? []) === 1 ? 'respuesta' : 'respuestas' }}
                            </span>
                            <button class="comm-reply-btn" onclick="toggleReplyForm({{ $rec['id'] }}, this)">
                                <i class="fas fa-reply"></i> Responder
                            </button>
                        </div>

                        {{-- Formulario respuesta --}}
                        <div class="comm-reply-box" id="reply-form-{{ $rec['id'] }}" style="display:none">
                            <form action="{{ route('recommendations.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="comm-reply-box__inner">
                                    <img src="{{ session('user.profile_photo') ?: asset('img/profile.png') }}"
                                         class="comm-avatar comm-avatar--sm" alt="Tu foto">
                                    <div class="comm-reply-box__fields">
                                        <textarea name="text" class="comm-textarea comm-textarea--sm"
                                                  placeholder="Escribe una respuesta..." required></textarea>

                                        <div class="comm-reply-box__actions">
                                            <input type="file" name="media_file"
                                                   id="replyMedia-{{ $rec['id'] }}"
                                                   accept="image/*,video/*" style="display:none"
                                                   onchange="previewMedia(this, 'replyPreview-{{ $rec['id'] }}', 'replyFileName-{{ $rec['id'] }}')">
                                            <button type="button" class="comm-media-btn comm-media-btn--sm"
                                                    onclick="document.getElementById('replyMedia-{{ $rec['id'] }}').click()">
                                                <i class="fas fa-image"></i>
                                                <span id="replyFileName-{{ $rec['id'] }}">Foto/Video</span>
                                            </button>
                                            <button type="submit" class="comm-submit-btn comm-submit-btn--sm">
                                                <i class="fas fa-paper-plane"></i> Responder
                                            </button>
                                        </div>

                                        <div id="replyPreview-{{ $rec['id'] }}" class="comm-preview" style="display:none">
                                            <button type="button" class="comm-preview__remove"
                                                    onclick="removeMedia('replyMedia-{{ $rec['id'] }}','replyPreview-{{ $rec['id'] }}','replyFileName-{{ $rec['id'] }}')">
                                                <i class="fas fa-xmark"></i> Quitar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="category" value="{{ $rec['category'] }}">
                                <input type="hidden" name="parent_id" value="{{ $rec['id'] }}">
                            </form>
                        </div>

                        {{-- Respuestas anidadas --}}
                        @if (!empty($rec['replies']))
                            <div class="comm-replies">
                                @foreach ($rec['replies'] as $reply)
                                    @php
                                        $replyDate = \Carbon\Carbon::parse($reply['created_at'] ?? $reply['date'] ?? now())
                                            ->setTimezone('America/Bogota');
                                    @endphp
                                    <div class="comm-reply">
                                        @php $replyPhoto = $reply['user']['profile_photo'] ?? null; @endphp
                                        <img src="{{ $replyPhoto ?: asset('img/profile.png') }}"
                                             class="comm-avatar comm-avatar--sm"
                                             onerror="if(!this.dataset.fb){this.dataset.fb='1';this.src='{{ asset('img/profile.png') }}'}">
                                        <div class="comm-reply__bubble">
                                            <div class="comm-reply__meta">
                                                <span class="comm-reply__name">{{ $reply['user']['name'] ?? 'Anónimo' }}</span>
                                                <span class="comm-reply__time">
                                                    {{ $replyDate->diffForHumans() }}
                                                    <span class="comm-post__date-full">
                                                        · {{ $replyDate->format('d M Y, H:i') }}
                                                    </span>
                                                </span>
                                            </div>
                                            <p class="comm-reply__text">{{ $reply['text'] }}</p>

                                            @if (!empty($reply['media_url']))
                                                <div class="comm-post__media">
                                                    @if (($reply['media_type'] ?? '') === 'video')
                                                        <video controls class="comm-media-file comm-media-file--sm">
                                                            <source src="{{ $reply['media_url'] }}" type="video/mp4">
                                                        </video>
                                                    @else
                                                        <img src="{{ $reply['media_url'] }}"
                                                             class="comm-media-file comm-media-file--sm comm-media-file--img"
                                                             alt="Imagen adjunta"
                                                             onclick="openLightbox(this.src)">
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </article>

                @empty
                    <div class="comm-empty">
                        <div class="comm-empty__icon"><i class="fas fa-seedling"></i></div>
                        <h3>¡Sé el primero en compartir!</h3>
                        <p>Aún no hay publicaciones en la comunidad. Comparte tu experiencia o haz una pregunta.</p>
                    </div>
                @endforelse
            </div>

        </div>

        {{-- ══ SIDEBAR ══ --}}
        <aside class="comm-sidebar">

            {{-- Guía de categorías --}}
            <div class="comm-widget">
                <h3 class="comm-widget__title"><i class="fas fa-tag"></i> Categorías</h3>
                <ul class="comm-cat-guide">
                    <li>
                        <span class="cat-dot cat-dot--recomendacion"></span>
                        <div>
                            <strong>Recomendación</strong>
                            <small>Comparte técnicas y consejos</small>
                        </div>
                    </li>
                    <li>
                        <span class="cat-dot cat-dot--opinion"></span>
                        <div>
                            <strong>Opinión</strong>
                            <small>Expresa tu punto de vista</small>
                        </div>
                    </li>
                    <li>
                        <span class="cat-dot cat-dot--duda"></span>
                        <div>
                            <strong>Duda</strong>
                            <small>Pregunta a la comunidad</small>
                        </div>
                    </li>
                    <li>
                        <span class="cat-dot cat-dot--problema"></span>
                        <div>
                            <strong>Problema</strong>
                            <small>Reporta una dificultad</small>
                        </div>
                    </li>
                </ul>
            </div>

            {{-- Buenas prácticas --}}
            <div class="comm-widget">
                <h3 class="comm-widget__title"><i class="fas fa-shield-alt"></i> Buenas prácticas</h3>
                <ul class="comm-tips">
                    <li><i class="fas fa-check"></i> Sé respetuoso con todos los miembros</li>
                    <li><i class="fas fa-check"></i> Comparte información verificada</li>
                    <li><i class="fas fa-check"></i> Usa la categoría correcta</li>
                    <li><i class="fas fa-check"></i> Adjunta fotos para más claridad</li>
                    <li><i class="fas fa-check"></i> Responde las dudas de otros</li>
                </ul>
            </div>

        </aside>
    </div>
</main>

{{-- Lightbox --}}
<div id="lightbox" onclick="closeLightbox()">
    <div class="lightbox-inner">
        <button class="lightbox-close" onclick="event.stopPropagation(); closeLightbox()">
            <i class="fas fa-xmark"></i>
        </button>
        <img id="lightboxImg" src="" alt="">
    </div>
</div>

<script>
// ── Selector de categoría ──────────────────────────────────
function selectCat(btn) {
    document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('categoryInput').value = btn.dataset.val;
}

// ── Toggle respuesta ───────────────────────────────────────
function toggleReplyForm(id, btn) {
    const box  = document.getElementById('reply-form-' + id);
    const open = box.style.display === 'none';
    box.style.display = open ? 'block' : 'none';
    btn.classList.toggle('active', open);
    if (open) box.querySelector('textarea').focus();
}

// ── Preview media ──────────────────────────────────────────
function previewMedia(input, previewId, nameId) {
    const file    = input.files[0];
    const preview = document.getElementById(previewId);
    const nameEl  = document.getElementById(nameId);
    if (!file) return;
    if (nameEl) nameEl.textContent = file.name.length > 18 ? file.name.slice(0, 18) + '…' : file.name;
    preview.style.display = 'block';
    const old = preview.querySelector('img, video');
    if (old) old.remove();
    const isVideo = file.type.startsWith('video/');
    const el = document.createElement(isVideo ? 'video' : 'img');
    el.className = 'comm-media-file comm-media-file--preview';
    if (isVideo) el.controls = true;
    el.src = URL.createObjectURL(file);
    preview.prepend(el);
}

// ── Quitar media ───────────────────────────────────────────
function removeMedia(inputId, previewId, nameId) {
    document.getElementById(inputId).value = '';
    const preview = document.getElementById(previewId);
    preview.style.display = 'none';
    const media = preview.querySelector('img, video');
    if (media) media.remove();
    const nameEl = document.getElementById(nameId);
    if (nameEl) nameEl.textContent = nameEl.closest('.comm-reply-box') ? 'Foto/Video' : 'Adjuntar';
}

// ── Filtros ────────────────────────────────────────────────
function filterPosts(cat, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.comm-post').forEach(post => {
        post.style.display = (cat === 'all' || post.dataset.category === cat) ? 'block' : 'none';
    });
}

// ── Lightbox ───────────────────────────────────────────────
function openLightbox(src) {
    document.getElementById('lightboxImg').src = src;
    document.getElementById('lightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
    document.body.style.overflow = '';
}
</script>
@endsection
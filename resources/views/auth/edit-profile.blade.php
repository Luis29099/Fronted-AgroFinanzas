@extends('layouts.app')

@section('content')

<style>
    .profile-wrapper {
        max-width: 650px;
        margin: 120px auto 40px;
        padding: 20px;
        font-family: 'Inter', sans-serif;
        animation: fadeInScale .6s ease-out;
    }

    .profile-card {
        background: #111;
        padding: 35px;
        border-radius: 15px;
        box-shadow: 0 0 25px rgba(24, 217, 46, 0.2);
    }

    .profile-title {
        text-align: center;
        font-size: 2rem;
        font-weight: 700;
        color: #18d92e;
        margin-bottom: 30px;
    }

    /* Foto circular */
    .profile-photo-container {
        display: flex;
        justify-content: center;
        margin-bottom: 25px;
    }

    .profile-photo-circle {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #18d92e;
        box-shadow: 0 0 15px rgba(24, 217, 46, 0.4);
    }

    .profile-photo-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Input archivo */
    .file-label {
        display: block;
        margin: 0 auto;
        text-align: center;
        padding: 10px 15px;
        width: 70%;
        background: #1f1f1f;
        color: #18d92e;
        border: 1px solid #18d92e;
        border-radius: 8px;
        cursor: pointer;
        transition: .3s ease;
        margin-bottom: 25px;
    }

    .file-label:hover {
        background: #18d92e;
        color: black;
        box-shadow: 0 0 12px rgba(24, 217, 46, 0.4);
    }

    #photo_preview {
        display: none;
    }

    /* Campos */
    .form-group label {
        color: #bbb;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .form-group input {
        width: 100%;
        padding: 12px;
        background: #222;
        border: 1px solid #333;
        color: white;
        border-radius: 8px;
        transition: .3s ease;
    }

    .form-group input:focus {
        border-color: #18d92e;
        box-shadow: 0 0 6px rgba(24, 217, 46, 0.5);
        outline: none;
    }

    .submit-btn {
        width: 100%;
        padding: 15px;
        border-radius: 8px;
        background: #38ef7d;
        border: none;
        margin-top: 25px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: .3s;
    }

    .submit-btn:hover {
        background: #11998e;
        color: white;
        box-shadow: 0 4px 15px rgba(56, 239, 125, 0.4);
        transform: translateY(-3px);
    }
</style>


<div class="profile-wrapper">
    <div class="profile-card">

        <h2 class="profile-title">Editar Perfil</h2>

        <form action="{{ route('perfil.actualizar') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="profile-photo-container">
                <div class="profile-photo-circle">
                    <img id="imgPreview" 
                        src="{{ $user['profile_photo'] ? asset('storage/'.$user['profile_photo']) : asset('img/default-user.png') }}">
                </div>
            </div>

            <label for="photo_preview" class="file-label">Cambiar Foto de Perfil</label>
            <input type="file" name="profile_photo" id="photo_preview" accept="image/*">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" value="{{ $user['name'] }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user['email'] }}" required>
            </div>

            <div class="form-group">
                <label>Fecha de nacimiento</label>
                <input type="date" name="birth_date" value="{{ $user['birth_date'] }}">
            </div>

            <button class="submit-btn">Guardar Cambios</button>
        </form>

    </div>
</div>

<script>
    document.getElementById("photo_preview").addEventListener("change", function() {
        const file = this.files[0];
        if (!file) return;

        const imgPreview = document.getElementById("imgPreview");
        imgPreview.src = URL.createObjectURL(file);
    });
</script>

@endsection
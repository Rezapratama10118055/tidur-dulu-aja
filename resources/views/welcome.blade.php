<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TidurDuluAja 🌙</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #0f2027, #203a43, #2c5364);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }

  .rain {
  pointer-events: none;
  position: fixed;
  inset: 0;                /* top:0;left:0;right:0;bottom:0; */
  z-index: 5;
  overflow: hidden;
  opacity: 0.12;          /* atur kecerahan */
}

/* buat banyak 'drop' pake linear-gradient dan transform animasi */
.rain::before,
.rain::after {
  content: "";
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background-image:
    linear-gradient(transparent 0%, rgba(255,255,255,0.15) 1%, transparent 2%),
    linear-gradient(transparent 0%, rgba(255,255,255,0.08) 1%, transparent 2%);
  background-size: 2px 100px, 1px 60px;
  animation: fall 1.6s linear infinite;
  filter: blur(0.6px);
  transform: translateZ(0);
}

.rain::after {
  animation-duration: 1.2s;
  opacity: 0.7;
  transform: translateX(50px);
}

@keyframes fall {
  0% { transform: translateY(-10%) translateX(0); opacity: 0; }
  10% { opacity: 1; }
  100% { transform: translateY(120%) translateX(30%); opacity: 0; }
}
        

        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #cce3ff;
        }

        .message {
            font-size: 1.2rem;
            margin: 20px 0;
            max-width: 400px;
            line-height: 1.6;
        }

        button {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #2563eb;
        }

        footer {
            margin-top: 40px;
            font-size: 0.8rem;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="rain"></div>
<audio id="rainSound" autoplay loop>
    <source src="{{ asset('rain.mp3') }}" type="audio/mpeg">
</audio>

    <h1>🌙 TidurDuluAja.com</h1>
    <div class="message">
        "{{ $message }}"
    </div>

    <form method="GET" action="{{ route('home') }}">
        <button type="submit">Tidur Dulu Aja 😴</button>
    </form>

    <footer>
        <p>Tenang, besok kamu akan merasa lebih baik 💜</p>
    </footer>

</body>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const rain = document.getElementById('rainSound');
    // coba langsung play
    rain.volume = 0.3; // atur volume lembut
    const playPromise = rain.play();

    if (playPromise !== undefined) {
        playPromise.catch(() => {
            // kalau autoplay diblokir, tampilkan tombol kecil untuk mengaktifkan
            const button = document.createElement('button');
            button.innerText = "🎧 Nyalakan Suara Hujan";
            button.style.position = 'fixed';
            button.style.bottom = '20px';
            button.style.right = '20px';
            button.style.padding = '10px 15px';
            button.style.borderRadius = '20px';
            button.style.border = 'none';
            button.style.background = '#3b82f6';
            button.style.color = 'white';
            button.style.cursor = 'pointer';
            document.body.appendChild(button);

            button.addEventListener('click', () => {
                rain.play();
                button.remove();
            });
        });
    }
});
</script>

</html>

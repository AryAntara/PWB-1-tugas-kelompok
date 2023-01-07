<!-- socket io -->
<script type="module">
  import io from "https://cdn.socket.io/4.4.1/socket.io.esm.min.js"
  socket = io(WS_URL)
</script>

<div class="container bg-light mt-5 p-4 pt-3">
    <button class="btn btn-primary mb-3" onclick="back()">Kembali</button>
    <button class="btn btn-danger mb-3 ms-auto" onclick="clearBackup()">Bersihkan Pesan</button>
    <div class="message mb-5" style="min-height: 100vh">
        <div class="message-box bg-abu-abu rounded-3 border border-1 text-dark p-1" style="opacity: 0.9;width: max-content;height: max-content">
            <p class="message-content p-1 m-1 " style="word-break: break-all; width: auto">Hi Apakah ada yang bisa dibantu ?</p>
        </div>
    </div>
    <div class="w-auto d-flex mt-4 fixed-bottom mr-2" style="left: 35%;bottom: 20px">
        <input type="text" class="form-control chat w-100% me-2" placeholder="Ketik disini...">
        <button class="btn btn-danger send">Kirim</button>
    </div>
</div>
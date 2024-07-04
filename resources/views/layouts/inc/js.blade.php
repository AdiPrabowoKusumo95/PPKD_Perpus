<!-- Vendor JS Files -->
<script src="{{asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/quill/quill.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('jquery-3.7.1.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('NiceAdmin/assets/js/main.js')}}"></script>

<script>
    const input = document.getElementById('foto_profil');
    const preview = document.getElementById('preview');

    input.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const img = document.createElement('img');
                img.src = event.target.result;
                img.style.maxWidth = '100px'; // Atur ukuran gambar jika perlu
                preview.innerHTML = ''; // Kosongkan div preview sebelumnya
                preview.appendChild(img); // Tampilkan gambar di div preview
            }
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = 'Preview tidak tersedia';
        }
    });
</script>

<script>
    $('.btn-add').click(function() {
        let tbody = $('tbody');
        let newTr = "<tr>";
        newTr += "<td>";
        newTr += "<select class='form-control' name='id_buku[]'>";
        newTr += "<option>Pilih Buku</option>"
        @foreach ($bukus as $buku)
            newTr += "<option value='{{ $buku->id }}'>{{ $buku->nama_buku }}</option>"
        @endforeach
        newTr += "</select>";
        newTr += "</td>";
        newTr += "<td><input type='date' name='tanggal_pinjam[]' class='form-control'></td>";
        newTr += "<td><input type='date' name='tanggal_pengembalian[]' class='form-control'></td>";
        newTr += "<td><input type='text' name='keterangan[]' class='form-control'></td>";
        newTr += "</tr>";
        tbody.append(newTr);
    });
</script>
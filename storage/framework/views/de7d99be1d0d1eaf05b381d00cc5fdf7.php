<?php $__env->startSection('body'); ?>

    <div class="bg-red-700 flex items-center justify-center gap-5 sm:gap-20  p-10 text-center text-white relative">
        <img class="border-4 h-20 p-1 sm:h-60 -rotate-12 border-white border-dashed rounded-md" src="<?php echo e(asset('img/logopdam.png')); ?>" alt="tangspor-logo.png">

        <div>
            <p class="font-bold text-4xl">LAPOR PDAM</p>
            <small class="sm:text-xl">LAYANAN PENGADUAN PELANGGAN PERUMDA TIRTARAJA!</small>
        </div>

        <i class="absolute sm:static top-8 right-7 h-6 sm:h-80 sm:w-60 fa-solid fa-comments"></i>
    </div>

    <div class="sm:flex sm:justify-center sm:items-center my-5 px-3">
        <ul class="steps steps-vertical md:steps-horizontal block text-white md:text-black">
            <li class="step step-neutral"><span class="bg-gradient-to-r from-red-700 to-slate-500 md:bg-none p-3 rounded-md w-full text-left sm:text-center">Buat Akun</span></li>
            <li class="step step-neutral"><span class="bg-gradient-to-r from-red-700 to-slate-500 md:bg-none p-3 rounded-md w-full text-left sm:text-center">Login</span></li>
            <li class="step step-neutral"><span class="bg-gradient-to-r from-red-700 to-slate-500 md:bg-none p-3 rounded-md w-full text-left sm:text-center">Laporkan Masalahmu</span></li>
            <li class="step step-neutral"><span class="bg-gradient-to-r from-red-700 to-slate-500 md:bg-none p-3 rounded-md w-full text-left sm:text-center">Kirim</span></li>
            <li class="step step-neutral"><span class="bg-gradient-to-r from-red-700 to-slate-500 md:bg-none p-3 rounded-md w-full text-left sm:text-center">Selesai</span></li>
          </ul>
    </div>

    <div class="relative mx-5 sm:mx-0">
        <div class=" bg-white border-2 border-slate-800 rounded-md w-full sm:w-96 p-5 mx-auto my-10 after:bg-gradient-to-r from-slate-500 to-red-700 after:z-[-1] after:h-52 after:w-full after:left-0 after:block after:absolute after:top-36 after:-skew-y-[12deg]">
            <label for="tgl_pengaduan">
                <p class="font-bold text-2xl mb-5 text-center bg-red-700 text-white rounded-md py-2">Form Pengaduan</p>
            </label>
            <form id="formPengaduan" action="/pengaduan/create" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="flex flex-col gap-3">
                    <div>
                        <label for="tgl_pengaduan">Tanggal Kejadian<span class="text-red-500">*</span></label>
                        <input hidden type="date" value="<?php echo e(date('Y-m-d')); ?>">
                        <input <?php echo e(Auth::check() ? '' : 'disabled'); ?> class="rounded-md w-full" type="date" max="<?php echo e(date('Y-m-d')); ?>" name="tgl_pengaduan" id="tgl_pengaduan">
                    </div>
                    <div>
                        <label for="kecamatan">Kecamatan<span class="text-red-500">*</span></label>
                        <select <?php echo e(Auth::check() ? '' : 'disabled'); ?> class="rounded-md w-full" name="kecamatan" id="kecamatan" required>
                            <option value="" disabled selected>- PILIH KECAMATAN -</option>

                            <?php $__currentLoopData = $kecamatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($i->id); ?>"><?php echo e($i->kecamatan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                    <div>
                        <label for="judul_pengaduan">Judul<span class="text-red-500">*</span></label>
                        <input <?php echo e(Auth::check() ? '' : 'disabled'); ?> class="rounded-md w-full" type="text" name="judul_pengaduan" id="judul_pengaduan">
                    </div>
                    <div>
                        <label for="isi_laporan">Isi<span class="text-red-500">*</span></label>
                        <textarea <?php echo e(Auth::check() ? '' : 'disabled'); ?> name="isi_laporan" id="isi_laporan" rows="3" class="rounded-md w-full"></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="foto">Foto</label>
                        
                        <input <?php echo e(Auth::check() ? '' : 'disabled'); ?> class="block w-full text-sm text-slate-500
                        border-2 rounded-full
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-red-100 file:text-red-700
                        hover:file:bg-red-100" 
                        type="file" name="foto" id="foto">
                    </div>
                    <div>
                        <?php if(Auth::check()): ?>
                            <small class="block mb-1">Catatan: Kolom yang memiliki bintang merah (<span class="text-red-500">*</span>) wajib diisi!</small>
                            <label for="modal-lapor" class="btn w-full">LAPOR!</label>


                            
                            <input type="checkbox" id="modal-lapor" class="modal-toggle" />
                            <div class="modal">
                            <div class="modal-box relative">
                                <h3 class="text-lg font-bold">Konfirmasi!</h3>
                                <p class="py-4">Anda yakin ingin melapor data tersebut?</p>
                                
                                <div class="modal-action">
                                    <label for="modal-lapor" class="btn">Batal</label>
                                    <button class="btn bg-red-600 hover:bg-red-700">LAPOR!</button>
                                </div>
                            </div>
                            </div>
                            
                        <?php else: ?>
                            <label class="btn w-full" for="modal-login">Login Terlebih Dahulu!</label>
                            <script>

                            </script>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-red-700 py-10 mt-5 text-center text-white border-y-4 border-red-900">
        <p class="font-semibold text-2xl">JUMLAH LAPORAN SAAT INI</p>
        <label class="text-5xl font-bold"><?php echo e($jml_pengaduan); ?></label>
    </div>

    <div class="flex bg-white items-center py-10 relative">

        <p class="ml-5 text-4xl font-bold">Klik untuk melihat informasi Tentang Kami <span class="ml-10 hidden sm:inline">--></span></p>
        <a class="btn relative z-20 btn-lg mx-10 w-32" href="/tentang-kami">KLIK</a>

        <div class="-z-[0] ml-auto sm:static absolute right-0 w-44 sm:w-1/4 h-20 border-4 border-r-0 rounded-l-lg border-slate-600 border-dashed">
        </div>
    </div>

    <div class="bg-slate-300 py-3">
        <p class="font-bold text-4xl text-center mb-3">Pembayaran Tagihan Online Bisa Di:</p>
        <div class="grid grid-cols-2 sm:grid-cols-4 grid-flow-row">
            <img src="<?php echo e(asset('img/sumsel.jpg')); ?>" alt="img_sponsors">
            <img src="<?php echo e(asset('img/pos.jpg')); ?>" alt="img_sponsors">
            <img src="<?php echo e(asset('img/bri.jpg')); ?>" alt="img_sponsors">
            <img src="<?php echo e(asset('img/indomaret.jpg')); ?>" alt="img_sponsors">
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp4\htdocs\admas\resources\views//admas/homepage.blade.php ENDPATH**/ ?>
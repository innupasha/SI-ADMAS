<?php $__env->startSection('body'); ?>
<div class="bg-red-700 py-10 text-center text-white border-y-4 border-red-900 relative">
    <p class="font-bold text-2xl">Detail Pengaduan</p>
    <small>Lihat Detail Pengaduan Disini</small>
</div>
<div class="p-3">
    <button type="button" onclick="history.back()" class="btn btn-sm w-full text-white"><< Kembali</button>
</div>

<div class="p-4">
    <div class="relative mb-5">
        <h3 class="text-center text-5xl font-bold before:inline-block before:h-12 before:absolute before:-ml-4 before:w-1 before:bg-red-700 break-words"><?php echo e($detail->judul); ?></h3>
        <small class="block text-center">Dibuat Oleh: <?php echo e($detail->user->username); ?></small>
    </div>

    <div class="sm:flex sm:gap-5">
        <div class="flex-initial w-full sm:w-[2000px] mx-auto mb-5 rounded-lg overflow-hidden border-2 border-slate-900 relative">

                <?php
                    function statusColor($detail)
                    {
                        switch ($detail->status) {
                            case '0':
                                return 'bg-pink-600';
                            break;
                            
                            case '1':
                                return 'bg-yellow-500';
                            break;
                            
                            case '2':
                                return 'bg-green-600';
                            break;
                            
                        }
                    }

                function statusText($detail)
                {
                    switch ($detail) {
                        case ($detail->status == 0):
                            return 'Belum Diproses';
                        break;

                        case ($detail->status == 1):
                            return 'Sedang Diproses';
                        break;

                        case ($detail->status == 2):
                            return 'Selesai';
                        break;
                    }
                }
                ?>

            <p class="<?php echo e(statusColor($detail)); ?> p-1 font-semibold text-white text-center border-b-2 border-slate-900"><?php echo e(statusText($detail)); ?></p>


            <figure class="bg-gray-300"><img class="h-[200px] sm:h-[350px] w-full object-contain" src="<?php echo e($detail->foto !== NULL ? (asset('img_pengaduan/' . $detail->foto)) : asset('img/kosong.jpg')); ?>" alt="img_pengaduan" /></figure>
            <p class="bg-sky-600 p-1 font-semibold text-white text-center">Detail: </p>
            <div class="box-border p-3 min-h-[100px]">
                <div class="flex gap-5 mb-5">
                    <h4 class="font-semibold break-words">Tanggal Kejadian: <?php echo e(date('d-m-Y', strtotime($detail->tgl_pengaduan))); ?></h4>
                    <h4 class="font-semibold break-words">Lokasi: <?php echo e($detail->kecamatan[0]->kecamatan); ?></h4>

                    <?php if(Auth::user()->nik == $detail->masyarakat_nik && $title == 'Detail Pengaduan' && $detail->status == '0'): ?>
           
                        <label for="modal-status" class="btn btn-sm bg-yellow-500"><i class="fa-solid fa-pen-to-square mr-3"></i> Edit Pengaduan</label>
                        <input type="checkbox" id="modal-status" class="modal-toggle" />
                        <div class="modal">
                        <div class="modal-box relative">
                            <h3 class="text-lg font-bold p-3 bg-red-700 mb-7 text-white rounded-md">Edit Pengaduan</h3>
                            
                            <form id="formEditPengaduan" action="/pengaduan/me/<?php echo e($detail->id); ?>/edit" method="POST">
                                <?php echo csrf_field(); ?>
                                
                                <label for="tgl_kejadian">Tanggal Kejadian</label>
                                <input class="w-full rounded-md" type="date" name="tgl_kejadian" id="tgl_kejadian" max="<?php echo e(date('Y-m-d')); ?>">
                                
                                <div class="modal-action">
                                    <label for="modal-status" class="btn btn-sm">Batal</label>
                                    <button type="submit" class="btn btn-sm bg-yellow-500 hover:bg-sky-6000">Edit</button>
                                </div>
                            </form>
                        </div>
                        </div>
                        
                    <?php endif; ?>
                    
                    <?php if(Auth::user()->lvl == 'admin' || Auth::user()->lvl == 'petugas'): ?>
           
                        <label for="modal-status" class="btn btn-sm bg-yellow-500"><i class="fa-solid fa-pen-to-square mr-3"></i> Edit Status</label>
                        <input type="checkbox" id="modal-status" class="modal-toggle" />
                        <div class="modal">
                        <div class="modal-box relative">
                            <h3 class="text-lg font-bold p-3 bg-red-700 mb-7 text-white rounded-md">Edit status Pengaduan</h3>
                            
                            <form id="formEdit" action="/pengaduan/me/<?php echo e($detail->id); ?>/edit-status" method="POST">
                                <?php echo csrf_field(); ?>
                                <select name="status_pengaduan" class="w-full rounded-md" required>
                                    <option value="" selected disabled>- PILIH -</option>
                                    <option value="0" <?php echo e($detail->status == '0' ? 'selected' : ''); ?>>Belum Diproses</option>
                                    <option value="1" <?php echo e($detail->status == '1' ? 'selected' : ''); ?>>Sedang Diproses</option>
                                    <option value="2" <?php echo e($detail->status == '2' ? 'selected' : ''); ?>>Selesai</option>
                                </select>
                                
                                <div class="modal-action">
                                    <label for="modal-status" class="btn btn-sm">Batal</label>
                                    <button type="submit" class="btn btn-sm bg-yellow-500 hover:bg-sky-6000">Edit</button>
                                </div>
                            </form>
                        </div>
                        </div>
                     <?php endif; ?>

                </div>
                <p><span class="font-semibold">Isi:</span> <?php echo e($detail->isi_laporan); ?></p>
            </div>
        </div>
    
        <div class="bg-slate-200  w-full sm:w-[800px] mx-auto mb-5 rounded-lg border-2 border-slate-900 relative overflow-hidden">
            <p class="bg-sky-600 p-1 text-white text-xl text-center border-b-2 border-slate-900 rounded-t-md">Tanggapan</p>
            <div class="p-3 min-h-fit <?php echo e($tanggapan->first() ? 'max-h-[550px]' : 'max-h-[500px]'); ?>  mb-10 overflow-y-auto">
                
                <?php if(empty($tanggapan->first())): ?>
                    <p class="text-slate-400 text-center">-Tanggapan Kosong-</p>
                <?php endif; ?>

                <?php $__currentLoopData = $tanggapan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(($i->user->nik ?? NULL) !== Auth::user()->nik): ?>
                    <div class="text-white">
                        <small class="text-black block w-[36ch] truncate"><?php echo e($i->user->name ?? 'NULL'); ?></small>
                        <p class="bg-gradient-to-r from-red-500 to-blue-600 py-2 pr-5 pl-8 w-fit mb-3 rounded-t-lg rounded-br-lg break-words"><?php echo e($i->tanggapan ?? 'NULL'); ?> <br><span class="text-xs text-right block"><?php echo e($i->tgl_tanggapan); ?></span></p>
                    </div>
                <?php else: ?>
                    <div class="text-white w-full relative">
                        <p class="bg-gradient-to-r from-blue-500 to-green-600 py-2 pl-5 pr-8  w-fit mb-3 rounded-t-lg rounded-bl-lg break-words ml-auto "><?php echo e($i->tanggapan ?? 'NULL'); ?> 
                            
                            

                            <br><span class="text-xs text-right block"><?php echo e($i->tgl_tanggapan); ?></p>
                    </div>
                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            
            <?php if($detail->status !== '2'): ?>
                <div class="bg-white absolute bottom-0 w-full">
                    <form class="flex" action="/pengaduan/me/<?php echo e($detail->id); ?>/send-tanggapan" method="POST">
                        <?php echo csrf_field(); ?>
                        <input class="border-none focus:ring-0 w-full rounded-b-md h-12  placeholder:text-slate-400" placeholder="Ketik Disini..." type="text" name="pesan">
                        <button type="submit" class="py-2 px-3 bg-blue-600 hover:bg-blue-700 active:scale-90 active:bg-blue-800 text-white rounded-full"><i class="fa-regular fa-xl fa-paper-plane"></i></button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>

<div class="text-center mt-10 bg-slate-600 p-10">
    <label class="text-white block font-bold text-5xl">Ingin Buat Pengaduan?</label>
    
    <a class="btn btn-lg bg-red-700 mt-5" href="/">Buat Pengaduan</a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp4\htdocs\admas\resources\views/admas/pengaduan_detail.blade.php ENDPATH**/ ?>
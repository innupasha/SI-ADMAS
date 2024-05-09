<?php $__env->startSection('body'); ?>

<div class="bg-red-700 py-10 text-center text-white border-y-4 border-red-900">
    <p class="font-bold text-2xl"><?php echo e($title); ?></p>
    <small>Seluruh Pengaduan Warga</small>
</div>

    <?php if($title == 'Seluruh Pengaduan'): ?>
        <div class="border border-black rounded-md p-2 bg-white m-5 sm:m-10">
            <label for="tgl_pengaduan">
                <p class="font-semibold text-white h-14 xl:h-fit text-center bg-sky-500 rounded-md sm:py-2">Seluruh <br class="xl:hidden">Pengaduan</p>
            </label>
            <p class="text-4xl font-bold text-center my-5 truncate"><?php echo e($jml->count( )); ?></p>
        </div>
        
        <div class="flex flex-wrap gap-5 justify-center mb-5 sm:m-10">
        
            <div class="sm:flex-1 border border-black rounded-md p-2 bg-white hover:scale-110 transition-transform">
                <label for="tgl_pengaduan">
                    <p class="font-semibold text-white h-14 xl:h-fit text-center bg-red-700 rounded-md sm:py-2">Pengaduan <br class="xl:hidden">Belum Diproses</p>
                </label>
                <p class="text-4xl font-bold text-center my-5 truncate"><?php echo e($jml->where('status', '=', '0')->count()); ?></p>
                <a class="btn btn-sm w-full text-sm" href="/admin/pengaduan-belum-diproses">Selengkapnya <span>>></span></a>
            </div>
        
            <div class="sm:flex-1 border border-black rounded-md p-2 bg-white hover:scale-110 transition-transform">
                <label for="tgl_pengaduan">
                    <p class="font-semibold text-white h-14 xl:h-fit text-center bg-yellow-500 rounded-md sm:py-2">Pengaduan <br class="xl:hidden">Sedang Diproses</p>
                </label>
                <p class="text-4xl font-bold text-center my-5 truncate"><?php echo e($jml->where('status', '=', '1')->count()); ?></p>
                <a class="btn btn-sm w-full text-sm" href="/admin/pengaduan-sedang-diproses">Selengkapnya <span>>></span></a>
            </div>
        
            <div class="sm:flex-1 border border-black rounded-md p-2 bg-white hover:scale-110 transition-transform">
                <label for="tgl_pengaduan">
                    <p class="font-semibold text-white h-14 xl:h-fit text-center bg-green-500 rounded-md sm:py-2">Pengaduan <br class="xl:hidden">Telah Selesai</p>
                </label>
                <p class="text-4xl font-bold text-center my-5 truncate"><?php echo e($jml->where('status', '=', '2')->count()); ?></p>
                <a class="btn btn-sm w-full text-sm" href="/admin/pengaduan-selesai">Selengkapnya <span>>></span></a>
            </div>
        
        </div>
    <?php endif; ?>

    
    <div class="pt-1 p-4 bg-slate-800">
        <?php if($title !== 'Seluruh Pengaduan'): ?>
            <a href="/admin/seluruh-pengaduan" class="btn btn-sm w-full mb-5"><< Kembali</a>
        <?php endif; ?>

        <div class="relative mb-5 mt-5">
            <h3 class="text-center text-white text-5xl font-bold before:inline-block before:h-12 before:absolute before:-ml-4 before:w-3 before:bg-red-700">List Pengaduan</h3>
        </div>

        <?php
            function search($title)
            {
                if($title == 'Seluruh Pengaduan')
                {
                    return '/admin/seluruh-pengaduan';
                }

                if($title == 'Admin Pengaduan Belum Diproses')
                {
                    return '/admin/pengaduan-belum-diproses';
                }

                if($title == 'Admin Pengaduan Sedang Diproses')
                {
                    return '/admin/pengaduan-sedang-diproses';
                }
                
                if($title == 'Admin Pengaduan Selesai')
                {
                    return '/admin/pengaduan-selesai';
                }


            }
        ?>

<div>
    <form class="sm:flex items-center gap-2" action="<?php echo e(search($title)); ?>" method="GET">
        <div class="flex  gap-3 my-5">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <div class="flex sm:flex-row <?php echo $title !== 'Seluruh Pengaduan' ? 'flex-col' : ''; ?> gap-3">
                                <div>
                                    <label for="tgl_awal" class=" text-white">Tanggal Awal: </label>
                                    <input class="w-full sm:w-auto rounded-md p-1 text-[15px]" type="date" name="tgl_awal" id="tgl_awal" value="<?php echo e(Session::get('tgl_awal')); ?>">
                                </div>
                                
                                <div>
                                    <label for="tgl_akhir" class=" text-white">Tanggal Akhir: </label>
                                    <input class="w-full sm:w-auto rounded-md p-1 text-[15px]" type="date" name="tgl_akhir" id="tgl_akhir" value="<?php echo e(Session::get('tgl_akhir')); ?>">
                                </div>
    
                            </div>
                           
                            <?php if($title == 'Seluruh Pengaduan'): ?>
                                <div>
                                    <label for="status" class=" text-white">Status: </label>
                                    <select class="w-full sm:w-auto rounded-md p-1 pr-10 text-[15px]" name="status" id="status">
                                        <option value="" selected>- PILIH -</option>
                                        <option value="0" <?php echo e(Session::get('status') == '0' ? 'selected' : ''); ?>>Belum Diproses</option>
                                        <option value="1" <?php echo e(Session::get('status') == '1' ? 'selected' : ''); ?>>Sedang Diproses</option>
                                        <option value="2" <?php echo e(Session::get('status') == '2' ? 'selected' : ''); ?>>Selesai</option>
                                    </select>
                                </div>
                            <?php endif; ?>

                        </div>
                        
                    </div>
                    
                      
                        <div class="sm:ml-auto flex gap-3 my-3">
                            <input placeholder="Search disini..." class="w-full sm:w-auto rounded-md p-1 text-[15px]" type="search" name="search" id="search_pengaduan" value="<?php echo e(Session::get('search')); ?>">
                            <button data-tooltip-target="tooltip-filter" class="bg-sky-400 btn btn-sm sm:mt-0"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <div id="tooltip-filter" role="tooltip" class="border border-black transition absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium bg-white rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Cari
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <a data-tooltip-target="tooltip-reset" href="<?php echo e(search($title)); ?>" class="bg-red-600 btn btn-sm sm:mt-0"><i class="fa-solid fa-arrow-rotate-left"></i></a>        
                            <div id="tooltip-reset" role="tooltip" class="border border-black transition absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium bg-white rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Atur Ulang
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                      
                </form>
            </div>
        
            <?php if(Auth::user()->lvl == 'admin'): ?>
                <?php if($title == 'Seluruh Pengaduan'): ?>
                    <a href="/admin/seluruh-pengaduan/export-excel?tgl_awal=<?php echo e($tgl_awal); ?>&tgl_akhir=<?php echo e($tgl_akhir); ?>&search=<?php echo e($search); ?>&status=<?php echo e($status); ?>">
                <?php elseif($title == 'Admin Pengaduan Belum Diproses'): ?>
                    <a href="/admin/pengaduan-belum-diproses/export-excel?tgl_awal=<?php echo e($tgl_awal); ?>&tgl_akhir=<?php echo e($tgl_akhir); ?>&search=<?php echo e($search); ?>&status=0">
                <?php elseif($title == 'Admin Pengaduan Sedang Diproses'): ?>
                    <a href="/admin/pengaduan-sedang-diproses/export-excel?tgl_awal=<?php echo e($tgl_awal); ?>&tgl_akhir=<?php echo e($tgl_akhir); ?>&search=<?php echo e($search); ?>&status=1">
                <?php elseif($title == 'Admin Pengaduan Selesai'): ?>
                    <a href="/admin/pengaduan-selesai/export-excel?tgl_awal=<?php echo e($tgl_awal); ?>&tgl_akhir=<?php echo e($tgl_akhir); ?>&search=<?php echo e($search); ?>&status=2">
                <?php endif; ?>
                    <div class="rounded-t-md bg-green-500 hover:bg-green-600 active:bg-green-700 p-2 text-center text-white">
                    <img class="inline-block invert h-5 mx-auto" src="<?php echo e(asset('img/excel.png')); ?>" alt="excel.png"><span class="ml-3">Export</span>
                    </div>
                </a>
            <?php endif; ?>

        <div class="<?php echo e(Auth::user()->lvl == 'petugas' ? 'rounded-t-md' : ''); ?>  rounded-b-md overflow-auto">
            
                <table class="table table-auto table-zebra table-compact w-full bg-white overflow-auto mb-5">
                    <thead class="text-center">
                        <tr>
                            <th class="sm:w-[5%]">No.</th>
                            <th class="sm:w-[15%]">Tanggal</th>
                            <th>NIK</th>    
                            <th class="sm:w-[45%]">Judul</th>
                            <th class="sm:w-[15%]">Status</th>
                            <th class="sm:w-[10%]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            class status
                            {
                                function colorStatus($pengaduan)
                                {
                                    switch ($pengaduan->status) {
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

                                function textStatus($pengaduan)
                                {
                                    switch ($pengaduan->status) {
                                        case '0':
                                            return 'Belum Diproses (0)';
                                            break;
                                            
                                        case '1':
                                            return 'Sedang Diproses (1)';
                                            break;

                                        case '2':
                                            return 'Selesai (2)';
                                            break;

                                    }
                                }
                            }
                            
                            $status = new status
                        ?>

                        <?php if(!empty($pengaduan->first())): ?>
                            <?php $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="[&>td]:border [&>td]:p-2 text-center">
                                    <th><p class=""><?php echo e($pengaduan->firstItem() + $index); ?></p></th>
                                    <td><p class=""><?php echo e(date('d-m-Y', strtotime($i->tgl_pengaduan))); ?></p></td>        
                                    <td><a href="/admin/user/detail/<?php echo e($i->masyarakat_nik); ?>" class="underline"><?php echo e($i->masyarakat_nik); ?></a></td>           
                                    <td><p class=""><?php echo e($i->judul); ?></p></td>
                                    <td><p class=" text-sm <?php echo e($status->colorStatus($i)); ?> rounded-md p-1 mx-auto text-white w-32"><span class=""><?php echo e($status->textStatus($i)); ?></span></p></td>
                                    <td class="">
                                        <div class="flex flex-col gap-1">
                                                <?php if($i->status !== '2'): ?>
                                            <label for="modal-hapus" class="btn btn-sm w-full bg-red-600 hover:bg-red-700"><i class="fa-solid fa-trash-can"></i></label>
                                                <input type="checkbox" id="modal-hapus" class="modal-toggle" />
                                                <div class="modal">
                                                <div class="modal-box relative">
                                                    <h3 class="text-xl font-bold bg-red-700 text-white rounded-md p-3">Hapus Pengaduan</h3>
                                                    <p class="py-4">Anda yakin ingin menghapus pengaduan?</p>
                                                    <div class="modal-action">
                                                        <label for="modal-hapus" class="btn btn-sm">Batal</label>
                                                        <form action="/pengaduan/delete/<?php echo e($i->id); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <button class="btn btn-sm bg-red-600 hover:bg-red-700" type="submit">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>
                                            <?php endif; ?>

                                            <a href="<?php echo e('/pengaduan/me/' . $i->id); ?>" class="w-full btn btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <td colspan="6"><p class="text-center text-2xl font-semibold p-5 rounded-b-md bg-slate-700 text-white">- Tidak ada Pengaduan -</p></td>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($pengaduan->links()); ?>

        <?php if(empty($pengaduan->first())): ?>
            <br><br><br><br><br><br><br><br><br>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp4\htdocs\admas\resources\views/admas/pengaduan_admin.blade.php ENDPATH**/ ?>
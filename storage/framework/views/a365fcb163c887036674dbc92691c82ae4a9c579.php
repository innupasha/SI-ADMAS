<?php $__env->startSection('body'); ?>

<div class="bg-red-700 py-10 text-center text-white border-y-4 border-red-900">
    <p class="font-bold text-2xl"><?php echo e($title); ?></p>
    <small>Atur akun disini</small>
</div>

<?php if($title == 'Rekapitulasi Pengguna'): ?>
    <div class="mx-5 border mt-5 border-black rounded-md p-2 bg-white ">
        <label for="tgl_pengaduan">
            <p class="font-semibold text-white h-14 xl:h-fit text-center bg-sky-500 rounded-md sm:py-2">Total <br class="xl:hidden">Akun</p>
        </label>
        <p class="text-4xl font-bold text-center my-5 truncate"><?php echo e($jml->count( )); ?></p>
        <label for="modal-tambah-akun" class="btn btn-sm w-full">Tambah +</label>
    </div>

     
     <input type="checkbox" id="modal-tambah-akun" class="modal-toggle" />
     <div class="modal">
         <div class="modal-box relative">
             <h3 class="text-lg font-bold bg-red-700 px-3 py-2 rounded-md text-white mb-5">Tambah Akun</h3>

             <form action="/admin/user/create" method="POST">
                <?php echo csrf_field(); ?>
                <div class="flex gap-3">
                    <div class="mb-2">
                        <label for="user_nik">NIK</label>
                        <input name="nik" id="user_nik" class="w-full rounded-md text-sm" type="text" required>
                    </div>
    
                    <div class="mb-2">
                        <label for="user_username">Username</label>
                        <input name="username" id="user_username" class="w-full rounded-md text-sm" type="text" required>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="user_name">Nama Lengkap</label>
                    <input name="name" id="user_name" class="w-full rounded-md text-sm" type="text" required>
                </div>

                <div class="mb-2">
                    <label for="user_email">Email</label>
                    <input name="email" id="user_email" class="w-full rounded-md text-sm" type="email" required>
                </div>

                <div class="mb-2">
                    <label for="password">Password</label>
                    <input name="password" id="password" class="w-full rounded-md text-sm" type="password" required>
                </div>
                
                <div class="mb-2">
                    <label for="user_password_confirmation">Konfirmasi Password</label>
                    <input name="password_confirmation" id="user_password_confirmation" class="w-full rounded-md text-sm" type="password" required>
                </div>

                <div class="mb-2">
                    <label for="user_telp">No. Telepon</label>
                    <input name="telp" id="user_telp" class="w-full rounded-md text-sm" type="number" required>
                </div>

                <div class="mb-2">
                    <label for="user_lvl">Jabatan</label>
                    <select name="lvl" id="user_lvl" class="w-full rounded-md text-sm" required>
                        <option value="">- PILIH -</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="masyarakat">Masyarakat</option>
                    </select>
                </div>

                 
                 <div class="text-right">
                     <label for="modal-tambah-akun" class="btn">Batal</label>
                     <button class="btn bg-blue-500 hover:bg-blue-600">Tambah +</button>
                 </div>
             </form>
         </div>
     </div>

    <div class="flex flex-wrap justify-center items-center gap-3 my-5 sm:mx-2 sm:px-3">

        <div class="sm:flex-1 border border-black rounded-md p-2 bg-white hover:scale-105 transition-transform">
            <label for="tgl_pengaduan">
                <p class="font-semibold text-white h-14 xl:h-fit text-center bg-red-700 rounded-md sm:py-2">Akun <br class="xl:hidden">Administrator</p>
            </label>
            <p class="text-4xl font-bold text-center my-5 truncate"><?php echo e($jml->where('lvl', '=', 'admin')->count()); ?></p>
            <a href="/admin/user/administrator" class="btn btn-sm w-full">Selengkapnya >></a>
        </div>

        <div class="sm:flex-1 border border-black rounded-md p-2 bg-white hover:scale-105 transition-transform">
            <label for="tgl_pengaduan">
                <p class="font-semibold text-white h-14 xl:h-fit text-center bg-yellow-500 rounded-md sm:py-2">Akun <br class="xl:hidden">Petugas</p>
            </label>
            <p class="text-4xl font-bold text-center my-5 truncate"><?php echo e($jml->where('lvl', '=', 'petugas')->count()); ?></p>
            <a href="/admin/user/petugas" class="btn btn-sm w-full">Selengkapnya >></a>
        </div>

        <div class="sm:flex-1 border border-black rounded-md p-2 bg-white hover:scale-105 transition-transform">
            <label for="tgl_pengaduan">
                <p class="font-semibold text-white h-14 xl:h-fit text-center bg-green-500 rounded-md sm:py-2">Akun <br class="xl:hidden">Masyarakat</p>
            </label>
            <p class="text-4xl font-bold text-center my-5 truncate"><?php echo e($jml->where('lvl', '=', 'masyarakat')->count()); ?></p>
            <a href="/admin/user/masyarakat" class="btn btn-sm w-full">Selengkapnya >></a>
        </div>

    </div>
<?php endif; ?>

<div class="bg-slate-800 p-4">

        <?php if($title !== 'Rekapitulasi Pengguna'): ?>
            <a class="btn btn-sm w-full mb-5" href="/admin/user"><< Kembali</a>
        <?php endif; ?>

        <div class="relative">
            <h3 class="text-white text-center text-5xl font-bold before:inline-block before:h-12 before:absolute before:-ml-4 before:w-3 before:bg-red-700"><?php echo e((isset($aktif) || isset($lvl) || isset($search)) ? 'List Pengguna' : 'Admin'); ?></h3>
        </div>

        <?php
            function search($title)
            {
                if($title == 'Rekapitulasi Pengguna')
                {
                    return '/admin/user';
                }

                if($title == 'Rekapitulasi Akun Admin')
                {
                    return '/admin/user/administrator';
                }

                if($title == 'Rekapitulasi Akun Petugas')
                {
                    return '/admin/user/petugas';
                }
                
                if($title == 'Rekapitulasi Akun Masyarakat')
                {
                    return '/admin/user/masyarakat';
                }


            }
        ?>

        <div class="mt-5">
            <form class="sm:flex items-center gap-5" action="<?php echo e(search($title)); ?>" method="GET">
                <div class="flex gap-5">
                    <div>
                        <label class="text-white" for="aktif">Status Aktif : </label>
                        <select class="w-full sm:w-auto rounded-md p-1 pr-10 text-[15px]" name="aktif" id="aktif">
                            <option value="" selected>- PILIH -</option>
                            <option value="1" <?php echo e(Session::get('aktif') == '1' ? 'selected' : ''); ?>>Aktif</option>
                            <option value="0" <?php echo e(Session::get('aktif') == '0' ? 'selected' : ''); ?>>Tidak Aktif</option>
                        </select>
                    </div>
    
                    <?php if($title == 'Rekapitulasi Pengguna'): ?>
                        <div>
                            <label class="text-white" for="lvl">Jabatan : </label>
                            <select class="w-full sm:w-auto rounded-md p-1 pr-10 text-[15px]" name="lvl" id="lvl">
                                <option value="" selected>- PILIH -</option>
                                <option value="admin" <?php echo e(Session::get('lvl') == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                <option value="petugas" <?php echo e(Session::get('lvl') == 'petugas' ? 'selected' : ''); ?>>Petugas</option>
                                <option value="masyarakat" <?php echo e(Session::get('lvl') == 'masyarakat' ? 'selected' : ''); ?>>Masyarakat</option>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="sm:ml-auto flex gap-3 my-3">
                    <input placeholder="Search disini..." class="w-full sm:w-auto rounded-md p-1 text-[15px]" type="search" name="search" id="search_pengaduan" value="<?php echo e(Session::get('search')); ?>">
                    <button data-tooltip-target="tooltip-filter" class="bg-sky-400 btn btn-sm"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <div id="tooltip-filter" role="tooltip" class="border border-black transition absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium bg-white rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Cari
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <a data-tooltip-target="tooltip-reset" href="<?php echo e(search($title)); ?>" class="bg-red-600 btn btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                    <div id="tooltip-reset" role="tooltip" class="border border-black transition absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium bg-white rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Atur Ulang
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </form>
        </div>
            
        <?php if(Auth::user()->lvl == 'admin' && $title == 'Rekapitulasi Pengguna'): ?>
        <?php if($title == 'Rekapitulasi Pengguna'): ?>
            <a href="/admin/user/export?lvl=<?php echo e($lvl); ?>&search=<?php echo e($search); ?>&aktif=<?php echo e($aktif); ?>">
        <?php elseif($title == 'Rekapitulasi Akun Admin'): ?>
            <a href="/admin/user/export?lvl=admin&search=<?php echo e($search); ?>&aktif=<?php echo e($aktif); ?>">
        <?php elseif($title == 'Rekapitulasi Akun Petugas'): ?>
            <a href="/admin/user/export?lvl=petugas&search=<?php echo e($search); ?>&aktif=<?php echo e($aktif); ?>">
        <?php elseif($title == 'Rekapitulasi Akun Masyarakat'): ?>
            <a href="/admin/user/export?lvl=masyarakat&search=<?php echo e($search); ?>&aktif=<?php echo e($aktif); ?>">
        <?php endif; ?>
                <div class="rounded-md mb-3 bg-green-500 hover:bg-green-600 active:bg-green-700 p-2 text-center text-white">
                <img class="inline-block invert h-5 mx-auto" src="<?php echo e(asset('img/excel.png')); ?>" alt="excel.png"><span class="ml-3">Export</span>
                </div>
            </a>
        <?php endif; ?>

        <div class="overflow-auto rounded-md">

            <table class="table table-compact table-zebra table-auto bg-white rounded-md overflow-x-auto w-full mb-5">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        class active
                        {
                            function colorHover($admin)
                            {
                                if ($admin->trashed()) {
                                    return 'bg-green-600';
                                }else {
                                    return 'bg-red-600';
                                }
                            }

                            function colorActive($admin)
                            {
                                if ($admin->trashed()) {
                                    return 'bg-green-500';
                                }else {
                                    return 'bg-red-500';
                                }
                            }
                        }
                        $active = new active;
                    ?>

                    <?php if(!empty($admin->first())): ?>
                        <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="[&>td]:border [&>td]:p-2 <?php echo e($i->aktif == '0' ? 'bg-red-300' : NULL); ?>">
                                <th class=""><p class="text-center"><?php echo e($admin->firstItem() + $index); ?></p></th>
                                <td><a href="/admin/user/detail/<?php echo e($i->nik); ?>" class="block text-center break-words underline"><?php echo e($i->nik); ?></a></td>
                                <td><p class="text-center break-words"><?php echo e($i->name); ?></p></td>
                                <td><p class="text-center break-words"><?php echo e($i->username); ?></p></td>
                                <td><p class="text-center break-words"><?php echo e($i->email); ?></p></td>
                                <td><p class="text-center break-words"><?php echo e($i->telp); ?></p></td>
                                <td><p class="text-center break-words"><?php echo e(ucfirst($i->lvl)); ?></p></td>
                                <td class="">
                                    <label for="modal-edit-<?php echo e($i->id); ?>" class="bg-yellow-400 p-1 my-1 block rounded-md text-white text-center hover:bg-yellow-500"><i class="fa-solid fa-pen-to-square"></i></label>
                                   
                                    <?php if($jml !== 1): ?>
                                        <a href="#my-modal-<?php echo e($i->id); ?>" class="<?php echo e($active->colorActive($i)); ?> block w-full p-1 my-1 rounded-md text-white text-center hover:<?php echo e($active->colorHover($i)); ?>"><i class="fa-solid fa-power-off"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>

                             
                             <input type="checkbox" id="modal-edit-<?php echo e($i->id); ?>" class="modal-toggle" />
                             <div class="modal">
                                 <div class="modal-box relative">
                                     <h3 class="text-lg font-bold bg-red-700 px-3 py-2 rounded-md text-white mb-5">Edit Akun</h3>
                                     <form action="/admin/user/edit/<?php echo e($i->id); ?>" method="POST">
                                         <?php echo csrf_field(); ?>
                                         <div class="mb-5">
                                             <label for="inp_nik">NIK</label>
                                             <input name="nik" id="inp_nik" class="w-full rounded-md" type="text" value="<?php echo e($i->nik); ?>" required>
                                         </div>
                                         <div class="mb-5">
                                             <label for="inp_name">Nama Lengkap</label>
                                             <input name="name" id="inp_name" class="w-full rounded-md" type="text" value="<?php echo e($i->name); ?>" required>
                                         </div>
                                         <div class="mb-5">
                                             <label for="inp_username">Username</label>
                                             <input name="username" id="inp_username" class="w-full rounded-md" type="text" value="<?php echo e($i->username); ?>" required>
                                         </div>
                                         <div class="mb-5">
                                             <label for="inp_email">Email</label>
                                             <input name="email" id="inp_email" class="w-full rounded-md" type="email" value="<?php echo e($i->email); ?>" required>
                                         </div>
                                         <div class="mb-5">
                                             <label for="inp_not_telp">No. Telepon</label>
                                             <input name="telp" id="inp_not_telp" class="w-full rounded-md" type="number" value="<?php echo e($i->telp); ?>" required>
                                         </div>
                                         <div class="mb-5">
                                             <label for="select_jabatan">Jabatan</label>
                                             <select class="rounded-md w-full" name="lvl" id="select_jabatan">
                                                <option value="" selected disabled>- PILIH -</option>
                                                <option value="admin" <?php echo e($i->lvl == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                                <option value="petugas" <?php echo e($i->lvl == 'petugas' ? 'selected' : ''); ?>>Petugas</option>
                                                <option value="masyarakat" <?php echo e($i->lvl == 'masyarakat' ? 'selected' : ''); ?>>Masyarakat</option>
                                             </select>
                                         </div>
                                         
                                         <div class="text-right">
                                             <label for="modal-edit-<?php echo e($i->id); ?>" class="btn">Batal</label>
                                             <button class="btn bg-yellow-500 hover:bg-yellow-600">Edit</button>
                                         </div>
                                     </form>
                                 </div>
                             </div>

                            
                            <div class="modal" id="my-modal-<?php echo e($i->id); ?>">
                                <div class="modal-box">
                                  <h3 class="font-bold text-lg">Konfirmasi!</h3>
                                  <p class="py-4">Anda yakin ingin <?php echo e($i->trashed() ? 'aktifkan' : 'non-aktifkan'); ?> akun?</p>
                                  <div class="modal-action">
                                   
                                   <form action="/admin/user/aktivasi/<?php echo e($i->id); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <a class="btn" href="#">Batal</a>
                                    <button class="btn <?php echo e($active->colorHover($i)); ?>" type="submit"><i class="fa-solid fa-power-off"></i></button>
                                   </form>

                                  </div>
                                </div>
                              </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        

                    <?php else: ?>
                        <td colspan="8"><p class="text-center text-2xl font-semibold p-5 bg-slate-700 text-white rounded-md">- Tidak ada akun -</p></td>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
                <?php echo e($admin->links()); ?>



                <?php if($aktif == NULL && $lvl == NULL && $search == NULL): ?>
                    
                    <div class="my-5">
                        <div class="relative mb-5">
                            <h3 class="text-white text-center text-5xl font-bold before:inline-block before:h-12 before:absolute before:-ml-4 before:w-3 before:bg-red-700">Petugas</h3>
                        </div>
                
                        <div class="overflow-auto rounded-md">
                
                            <table class="table table-compact table-zebra table-auto bg-white rounded-md overflow-x-auto w-full mb-5">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>No. Telepon</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                
                                    <?php if(!empty($petugas->first())): ?>
                                        <?php $__currentLoopData = $petugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="[&>td]:border [&>td]:p-2 <?php echo e($i->aktif == '0' ? 'bg-red-300' : NULL); ?>">
                                                <th class=""><p class="text-center"><?php echo e($petugas->firstItem() + $index); ?></p></th>
                                                <td><a href="/admin/user/detail/<?php echo e($i->nik); ?>" class="block text-center break-words underline"><?php echo e($i->nik); ?></a></td>
                                                <td><p class="text-center break-words"><?php echo e($i->name); ?></p></td>
                                                <td><p class="text-center break-words"><?php echo e($i->username); ?></p></td>
                                                <td><p class="text-center break-words"><?php echo e($i->email); ?></p></td>
                                                <td><p class="text-center break-words"><?php echo e($i->telp); ?></p></td>
                                                <td><p class="text-center break-words"><?php echo e(ucfirst($i->lvl)); ?></p></td>
                                                <td class="">
                                                    <label for="modal-edit-<?php echo e($i->id); ?>" class="bg-yellow-400 p-1 my-1 block rounded-md text-white text-center hover:bg-yellow-500"><i class="fa-solid fa-pen-to-square"></i></label>
                                                
                                                    <?php if($jml !== 1): ?>
                                                        <a href="#my-modal-<?php echo e($i->id); ?>" class="<?php echo e($active->colorActive($i)); ?> block w-full p-1 my-1 rounded-md text-white text-center hover:<?php echo e($active->colorHover($i)); ?>"><i class="fa-solid fa-power-off"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                
                                            
                                            <input type="checkbox" id="modal-edit-<?php echo e($i->id); ?>" class="modal-toggle" />
                                            <div class="modal">
                                                <div class="modal-box relative">
                                                    <h3 class="text-lg font-bold bg-red-700 px-3 py-2 rounded-md text-white mb-5">Edit Akun</h3>
                                                    <form action="/admin/user/edit/<?php echo e($i->id); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="mb-5">
                                                            <label for="inp_nik">NIK</label>
                                                            <input name="nik" id="inp_nik" class="w-full rounded-md" type="text" value="<?php echo e($i->nik); ?>" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="inp_name">Nama Lengkap</label>
                                                            <input name="name" id="inp_name" class="w-full rounded-md" type="text" value="<?php echo e($i->name); ?>" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="inp_username">Username</label>
                                                            <input name="username" id="inp_username" class="w-full rounded-md" type="text" value="<?php echo e($i->username); ?>" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="inp_email">Email</label>
                                                            <input name="email" id="inp_email" class="w-full rounded-md" type="email" value="<?php echo e($i->email); ?>" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="inp_not_telp">No. Telepon</label>
                                                            <input name="telp" id="inp_not_telp" class="w-full rounded-md" type="number" value="<?php echo e($i->telp); ?>" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="select_jabatan">Jabatan</label>
                                                            <select class="rounded-md w-full" name="lvl" id="select_jabatan">
                                                                <option value="" selected disabled>- PILIH -</option>
                                                                <option value="admin" <?php echo e($i->lvl == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                                                <option value="petugas" <?php echo e($i->lvl == 'petugas' ? 'selected' : ''); ?>>Petugas</option>
                                                                <option value="masyarakat" <?php echo e($i->lvl == 'masyarakat' ? 'selected' : ''); ?>>Masyarakat</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="text-right">
                                                            <label for="modal-edit-<?php echo e($i->id); ?>" class="btn">Batal</label>
                                                            <button class="btn bg-yellow-500 hover:bg-yellow-600">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                
                                            
                                            <div class="modal" id="my-modal-<?php echo e($i->id); ?>">
                                                <div class="modal-box">
                                                <h3 class="font-bold text-lg">Konfirmasi!</h3>
                                                <p class="py-4">Anda yakin ingin <?php echo e($i->trashed() ? 'aktifkan' : 'non-aktifkan'); ?> akun?</p>
                                                <div class="modal-action">
                                                
                                                <form action="/admin/user/aktivasi/<?php echo e($i->id); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <a class="btn" href="#">Batal</a>
                                                    <button class="btn <?php echo e($active->colorHover($i)); ?>" type="submit"><i class="fa-solid fa-power-off"></i></button>
                                                </form>
                
                                                </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                                        
                                        
                
                                    <?php else: ?>
                                        <td colspan="8"><p class="text-center text-2xl font-semibold p-5 bg-slate-700 text-white rounded-md">- Tidak ada akun -</p></td>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                            <?php echo e($petugas->links()); ?>

                    </div>
                    
                    
                    <div class="my-5">
                        <div class="relative mb-5">
                            <h3 class="text-white text-center text-5xl font-bold before:inline-block before:h-12 before:absolute before:-ml-4 before:w-3 before:bg-red-700">Masyarakat</h3>
                        </div>
                
                        <div class="overflow-auto rounded-md">
                
                            <table class="table table-compact table-zebra table-auto bg-white rounded-md overflow-x-auto w-full mb-5">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>No. Telepon</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                
                                    <?php if(!empty($masyarakat->first())): ?>
                                        <?php $__currentLoopData = $masyarakat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="[&>td]:border [&>td]:p-2 <?php echo e($i->aktif == '0' ? 'bg-red-300' : NULL); ?>">
                                                <th class=""><p class="text-center"><?php echo e($masyarakat->firstItem() + $index); ?></p></th>
                                                <td><a href="/admin/user/detail/<?php echo e($i->nik); ?>" class="block text-center break-words underline"><?php echo e($i->nik); ?></a></td>
                                                <td><p class="text-center break-words"><?php echo e($i->name); ?></p></td>
                                                <td><p class="text-center break-words"><?php echo e($i->username); ?></p></td>
                                                <td><p class="text-center break-words"><?php echo e($i->email); ?></p></td>
                                                <td><p class="text-center break-words"><?php echo e($i->telp); ?></p></td>
                                                <td><p class="text-center break-words"><?php echo e(ucfirst($i->lvl)); ?></p></td>
                                                <td class="">
                                                    <label for="modal-edit-<?php echo e($i->id); ?>" class="bg-yellow-400 p-1 my-1 block rounded-md text-white text-center hover:bg-yellow-500"><i class="fa-solid fa-pen-to-square"></i></label>
                                                
                                                    <?php if($jml !== 1): ?>
                                                        <a href="#my-modal-<?php echo e($i->id); ?>" class="<?php echo e($active->colorActive($i)); ?> block w-full p-1 my-1 rounded-md text-white text-center hover:<?php echo e($active->colorHover($i)); ?>"><i class="fa-solid fa-power-off"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                
                                            
                                            <input type="checkbox" id="modal-edit-<?php echo e($i->id); ?>" class="modal-toggle" />
                                            <div class="modal">
                                                <div class="modal-box relative">
                                                    <h3 class="text-lg font-bold bg-red-700 px-3 py-2 rounded-md text-white mb-5">Edit Akun</h3>
                                                    <form action="/admin/user/edit/<?php echo e($i->id); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="mb-5">
                                                            <label for="inp_nik">NIK</label>
                                                            <input name="nik" id="inp_nik" class="w-full rounded-md" type="text" value="<?php echo e($i->nik); ?>" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="inp_name">Nama Lengkap</label>
                                                            <input name="name" id="inp_name" class="w-full rounded-md" type="text" value="<?php echo e($i->name); ?>" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="inp_username">Username</label>
                                                            <input name="username" id="inp_username" class="w-full rounded-md" type="text" value="<?php echo e($i->username); ?>" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="inp_email">Email</label>
                                                            <input name="email" id="inp_email" class="w-full rounded-md" type="email" value="<?php echo e($i->email); ?>" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="inp_not_telp">No. Telepon</label>
                                                            <input name="telp" id="inp_not_telp" class="w-full rounded-md" type="number" value="<?php echo e($i->telp); ?>" required>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="select_jabatan">Jabatan</label>
                                                            <select class="rounded-md w-full" name="lvl" id="select_jabatan">
                                                                <option value="" selected disabled>- PILIH -</option>
                                                                <option value="admin" <?php echo e($i->lvl == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                                                <option value="petugas" <?php echo e($i->lvl == 'petugas' ? 'selected' : ''); ?>>Petugas</option>
                                                                <option value="masyarakat" <?php echo e($i->lvl == 'masyarakat' ? 'selected' : ''); ?>>Masyarakat</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="text-right">
                                                            <label for="modal-edit-<?php echo e($i->id); ?>" class="btn">Batal</label>
                                                            <button class="btn bg-yellow-500 hover:bg-yellow-600">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                
                                            
                                            <div class="modal" id="my-modal-<?php echo e($i->id); ?>">
                                                <div class="modal-box">
                                                <h3 class="font-bold text-lg">Konfirmasi!</h3>
                                                <p class="py-4">Anda yakin ingin <?php echo e($i->trashed() ? 'aktifkan' : 'non-aktifkan'); ?> akun?</p>
                                                <div class="modal-action">
                                                
                                                <form action="/admin/user/aktivasi/<?php echo e($i->id); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <a class="btn" href="#">Batal</a>
                                                    <button class="btn <?php echo e($active->colorHover($i)); ?>" type="submit"><i class="fa-solid fa-power-off"></i></button>
                                                </form>
                
                                                </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                                        
                                        
                
                                    <?php else: ?>
                                        <td colspan="8"><p class="text-center text-2xl font-semibold p-5 bg-slate-700 text-white rounded-md">- Tidak ada akun -</p></td>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                            <?php echo e($masyarakat->links()); ?>

                    </div>
                <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp4\htdocs\admas\resources\views/admas/rekapitulasi.blade.php ENDPATH**/ ?>
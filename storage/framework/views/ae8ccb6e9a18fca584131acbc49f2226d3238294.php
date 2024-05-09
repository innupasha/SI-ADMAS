<!DOCTYPE html>
<html class="bg-stone-100 scroll-smooth">
<head>
    <link rel="shortcut icon" href="<?php echo e(asset('img/logo-tangspor.png')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo e(asset('fa/css/all.min.css')); ?>">
    <script src="<?php echo e(asset('fa/js/all.min.js')); ?>"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title.' - '.env('APP_NAME')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldContent('head'); ?>
</head>
<body class="min-h-screen">
  <?php echo $__env->make('components/navbar-admas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="drawer h-full">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
          <!-- Page content here -->
          <?php echo $__env->make('components/pesan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('body'); ?>


            <?php echo $__env->make('components/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div> 
        <div class="drawer-side">
          <label for="my-drawer" class="drawer-overlay fixed w-full h-full"></label>
          <ul class="menu h-full overflow-x-auto fixed p-4 bg-slate-900 text-white">
              <label for="my-drawer" class="text-4xl font-bold text-center mb-3 bg-red-700 p-3 rounded-md"><img class="inline-block -mt-2 h-10 border-2 border-white rounded" src="<?php echo e(asset('img/logo-tangspor.png')); ?>" alt="logo-tangspor.png"> TIRTARAJA!</label>
            <!-- Sidebar content here -->
            <li class="border-2 border-slate-700 my-1 rounded-md hover:bg-slate-700 transition"><a href="/"><div class="w-5 mr-1"><i class="fa-solid fa-house"></i></div> Beranda</a></li>
            
            <?php if(Auth::check()): ?>
              <li class="border-2 border-slate-700 my-1 rounded-md hover:bg-slate-700 transition"><a href="/pengaduan"><div class="w-5 mr-1"><i class="fa-solid fa-user-pen"></i></div> Pengaduan Anda</a></li>
            <?php endif; ?>

            <li class="border-2 border-slate-700 my-1 rounded-md hover:bg-slate-700 transition"><a href="/tentang-kami"><div class="w-5 mr-1"><i class="fa-solid fa-circle-info"></i></div> Tentang Kami</a></li>

            <?php if((Auth::user()->lvl ?? NULL) == 'admin' || (Auth::user()->lvl ?? NULL) == 'petugas'): ?>
              <li class="border-2 border-slate-700 my-1 rounded-md hover:bg-slate-700 transition"><a href="/admin/seluruh-pengaduan"><div class="w-5 mr-1"><i class="fa-solid fa-comments"></i></div> Seluruh Pengaduan</a></li>
            <?php endif; ?>

            <?php if((Auth::user()->lvl ?? NULL) == 'admin'): ?>
              <li class="border-2 border-slate-700 my-1 rounded-md hover:bg-slate-700 transition"><a href="/admin/user"><div class="w-5 mr-1"><i class="fa-solid fa-users"></i></div> Rekapitulasi Pengguna</a></li>
              <li class="border-2 border-slate-700 my-1 rounded-md hover:bg-slate-700 transition"><a href="/admin/kecamatan"><div class="w-5 mr-1"><i class="fa-solid fa-location-dot"></i></div> Kecamatan</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
</body>
</html><?php /**PATH C:\xampp4\htdocs\admas\resources\views/layouts/base.blade.php ENDPATH**/ ?>
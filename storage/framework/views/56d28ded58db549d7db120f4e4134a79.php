<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link
          href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet"
        />
        <link rel="stylesheet" href="/resources/css/app.css" />
        <script
          src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
          defer
        ></script>
        <script src="../assets/js/init-alpine.js"></script>
      </head>
      <body>

        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => ['class' => 'mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

        <?php if(session('status')): ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-100">
            <div
                class="flex-1 h-full max-w-4xl md:container md:mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-100"
            >
                <div class="flex flex-col overflow-y-auto md:flex-row">
                
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                    <h1
                        class="mb-4 text-xl font-semibold text-gray-900 "
                    >
                        Login
                    </h1>
                    <label class="block mt-4 text-sm" value="<?php echo e(__('Email')); ?>">
                        <span class="text-gray-900 ">Email</span>
                        <input id="email"
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-100 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-900 dark:focus:shadow-outline-gray form-input"
                        placeholder="Email" type="email" name="email"
                        :value="old('email')"required
                        />
                    <label class="block mt-4 text-sm" value="<?php echo e(__('Password')); ?>" >
                        <span class="text-gray-900 ">Password</span>
                        <input id="password"
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-100 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-900 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter Password" name="password" type="password" required
                        />
                    </label>

                    <!-- You should use a button here, as the anchor is only used for the example  -->
                    <button type="submit"
                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center  text-black transition-colors duration-150 border border-gray-800 rounded-lg bg-orange-500 hover:bg-orange-500 focus:outline-none ">
                    <?php echo e(__('Log in')); ?>

                    </button>

                    <hr class="my-10 mt-5" />
                    <p class="mt-4">
                        <?php if(Route::has('password.request')): ?>
                        <a class="text-sm font-medium text-purple-600 hover:underline"
                        href="<?php echo e(route('password.request')); ?>">
                        <?php echo e(__('Forgot your password')); ?>

                     </a>
                     <?php endif; ?>
                    </p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </form>
    </body>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Christopher Llobrera\Desktop\hris\hris\resources\views/auth/login.blade.php ENDPATH**/ ?>
<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>
&lt;div class="hero min-h-[calc(100vh-16rem)]"&gt;
    &lt;div class="hero-content flex-col"&gt;
        &lt;div class="card w-96 bg-base-100"&gt;
            &lt;div class="card-body"&gt;
                &lt;h1 class="text-3xl font-bold text-center mb-6"&gt;Welcome Back&lt;/h1&gt;

                &lt;form method="POST" action="/login"&gt;
                    @csrf

                    &lt;!-- Email --&gt;
                    &lt;label class="floating-label mb-6"&gt;
                        &lt;input type="email"
                               name="email"
                               placeholder="[mail@example.com](&lt;mailto:mail@example.com&gt;)"
                               value="{{ old('email') }}"
                               class="input input-bordered @error('email') input-error @enderror"
                               required
                               autofocus&gt;
                        &lt;span&gt;Email&lt;/span&gt;
                    &lt;/label&gt;
                    @error('email')
                        &lt;div class="label -mt-4 mb-2"&gt;
                            &lt;span class="label-text-alt text-error"&gt;{{ $message }}&lt;/span&gt;
                        &lt;/div&gt;
                    @enderror

                    &lt;!-- Password --&gt;
                    &lt;label class="floating-label mb-6"&gt;
                        &lt;input type="password"
                               name="password"
                               placeholder="••••••••"
                               class="input input-bordered @error('password') input-error @enderror"
                               required&gt;
                        &lt;span&gt;Password&lt;/span&gt;
                    &lt;/label&gt;
                    @error('password')
                        &lt;div class="label -mt-4 mb-2"&gt;
                            &lt;span class="label-text-alt text-error"&gt;{{ $message }}&lt;/span&gt;
                        &lt;/div&gt;
                    @enderror

                    &lt;!-- Remember Me --&gt;
                    &lt;div class="form-control mt-4"&gt;
                        &lt;label class="label cursor-pointer justify-start"&gt;
                            &lt;input type="checkbox"
                                   name="remember"
                                   class="checkbox"&gt;
                            &lt;span class="label-text ml-2"&gt;Remember me&lt;/span&gt;
                        &lt;/label&gt;
                    &lt;/div&gt;

                    &lt;!-- Submit Button --&gt;
                    &lt;div class="form-control mt-8"&gt;
                        &lt;button type="submit" class="btn btn-primary btn-sm w-full"&gt;
                            Sign In
                        &lt;/button&gt;
                    &lt;/div&gt;
                &lt;/form&gt;

                &lt;div class="divider"&gt;OR&lt;/div&gt;
                &lt;p class="text-center text-sm"&gt;
                    Don't have an account?
                    &lt;a href="/register" class="link link-primary"&gt;Register&lt;/a&gt;
                &lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

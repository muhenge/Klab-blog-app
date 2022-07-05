@component('mail::message')
# Congulatutions!

you have successfully created a blog.

@component('mail::button', ['url' => '/'])
view the blogs
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

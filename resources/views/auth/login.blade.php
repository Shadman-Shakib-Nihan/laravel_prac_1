<form method="POST" action="/login">
    @csrf

    <x-layout>
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mr-auto ml-auto mt-6">
            <legend class="fieldset-legend">Login</legend>

            
            <label class="label">Email</label>
            <input type="email" name="email" class="input" placeholder="Email" required/>

            <x-form.error field="email" />

            <label class="label">Password</label>
            <input type="password" name="password" class="input" placeholder="Password" required />


            <button type="submit" class="btn btn-neutral mt-4">Login</button>
        </fieldset>
    </x-layout>
</form>
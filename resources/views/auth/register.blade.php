<form method="POST" action="/register">
    @csrf

    <x-layout>
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mr-auto ml-auto mt-6">
            <legend class="fieldset-legend">Register</legend>

            <label class="label">Name</label>
            <input type="text" name="name" class="input" placeholder="Name" required />

            <label class="label">Email</label>
            <input type="email" name="email" class="input" placeholder="Email" required/>

            <label class="label">Password</label>
            <input type="password" name="password" class="input" placeholder="Password" required />

            <button type="submit" class="btn btn-neutral mt-4">Register</button>
        </fieldset>
    </x-layout>
</form>
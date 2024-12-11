<form action="{{ route('sites.store') }}" method="POST">
    @csrf
    <div>
        <label for="domain">Domain</label>
        <input type="text" id="domain" name="domain" required>
    </div>
    <div>
        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
    <button type="submit">Create Site</button>
</form>
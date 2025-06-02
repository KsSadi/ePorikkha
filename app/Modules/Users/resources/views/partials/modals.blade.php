
<!-- User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="userForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="userName" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="userName" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="userEmail" name="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="userRole" class="form-label">Role *</label>
                                <select class="form-select" id="userRole" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="instructor">Instructor</option>
                                    <option value="evaluator">Evaluator</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="userStatus" class="form-label">Status *</label>
                                <select class="form-select" id="userStatus" name="status" required>
                                    <option value="active">Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="suspended">Suspended</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="userInstitution" class="form-label">Institution</label>
                        <input type="text" class="form-control" id="userInstitution" name="institution"
                               placeholder="Enter institution name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <span id="submitBtnText">Create User</span>
                        <i class="fas fa-spinner fa-spin d-none" id="submitSpinner"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const userModal = new bootstrap.Modal(document.getElementById('userModal'));
    const userForm = document.getElementById('userForm');
    let editingUserId = null;

    // Handle form submission
    userForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = document.querySelector('#userModal button[type="submit"]');
        const submitSpinner = document.getElementById('submitSpinner');
        const submitBtnText = document.getElementById('submitBtnText');

        // Show loading state
        submitBtn.disabled = true;
        submitSpinner.classList.remove('d-none');
        submitBtnText.textContent = editingUserId ? 'Updating...' : 'Creating...';

        const url = editingUserId
            ? `{{ url('admin/users') }}/${editingUserId}`
            : '{{ route("admin.users.store") }}';

        const method = editingUserId ? 'PUT' : 'POST';

        fetch(url, {
            method: method,
            headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message);
                userModal.hide();
                userForm.reset();
                editingUserId = null;

                // Reload the users table
                if (typeof userManagement !== 'undefined') {
                    userManagement.loadUsers();
                } else {
                    location.reload();
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        })
        .finally(() => {
            // Reset loading state
            submitBtn.disabled = false;
            submitSpinner.classList.add('d-none');
            submitBtnText.textContent = editingUserId ? 'Update User' : 'Create User';
        });
    });

    // Handle edit button clicks
    document.addEventListener('click', function(e) {
        if (e.target.closest('.action-btn.edit')) {
            const userId = e.target.closest('.action-btn.edit').dataset.userId;
            editUser(userId);
        }

        if (e.target.closest('.action-btn.delete')) {
            const userId = e.target.closest('.action-btn.delete').dataset.userId;
            deleteUser(userId);
        }
    });

    // Handle modal close
    document.getElementById('userModal').addEventListener('hidden.bs.modal', function() {
        userForm.reset();
        editingUserId = null;
        document.getElementById('userModalLabel').textContent = 'Add New User';
        document.getElementById('submitBtnText').textContent = 'Create User';
    });

    function editUser(userId) {
        // Fetch user data and populate form
        fetch(`{{ url('admin/users') }}/${userId}`)
        .then(response => response.json())
            .then(user => {
            editingUserId = userId;
            document.getElementById('userModalLabel').textContent = 'Edit User';
            document.getElementById('submitBtnText').textContent = 'Update User';

            // Populate form fields
            document.getElementById('userName').value = user.name;
            document.getElementById('userEmail').value = user.email;
            document.getElementById('userRole').value = user.role;
            document.getElementById('userStatus').value = user.status;
            document.getElementById('userInstitution').value = user.institution || '';

            userModal.show();
        })
            .catch(error => {
            console.error('Error fetching user:', error);
            alert('Error loading user data.');
        });
    }

    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
            fetch(`{{ url('admin/users') }}/${userId}`, {
                method: 'DELETE',
                headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                // Reload the users table
                if (typeof userManagement !== 'undefined') {
                    userManagement.loadUsers();
                } else {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error deleting user:', error);
                alert('Error deleting user.');
            });
        }
    }
});
</script>

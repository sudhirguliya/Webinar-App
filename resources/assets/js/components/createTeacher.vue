<template>
    <div class="panel panel-default" v-cloak>
        <div class="panel-body">
            <legend>Create Teacher</legend>

            <crud-form :student="student"></crud-form>

            <div class="text-center mrg-top-1em">
                <button class="btn btn-default" v-link="{ name: 'teacher_list' }">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    List
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                url: '/api/teachers',
                student: {
                    avatar: '',
                    name: '',
                    email: '',
                    phone: '',
                    password: '',
                    /*birth_date: '',*/
                }
            }
        },
        events: {
            'submitted'(student) {
                this.submit(student);
            },
        },
        methods: {
            submit(formData) {
                this.$http.post(this.url, formData)
                    .then(response => {
                        let alert = {
                            show: true,
                            type: 'success',
                            title: 'Success',
                            message: 'Teacher successfully created.'
                        };

                        this.$broadcast('showAlert', alert);

                        this.resetForm();
                    }).catch(response => {
                        let errors = response.body;

                        this.$broadcast('formErrors', errors);
                    });
            },
            resetForm() {
                this.student = {
                    avatar: '',
                    name: '',
                    email: '',
                    phone: '',
                    password: '',
                   /* birth_date: '',*/
                }
            }
        }
    }
</script>

<template>
    <div class="panel panel-default" v-cloak>
        <div class="panel-body">
            <legend>Edit Teacher</legend>

            <crud-form :student="student"></crud-form>

            <div class="text-center mrg-top-1em">
                <button class="btn btn-default" v-link="{ name: 'teacher_list' }">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    Back
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            this.$http.get('/api/teachers/' + this.teacherId)
                .then(response => {
                    this.student = response.data;
                })
                .catch(response => {
                    let alert = {
                        show: true,
                        type: 'danger',
                        title: 'Error',
                        message: response.statusText
                    };

                    this.$broadcast('showAlert', alert);
                });
        },
        data() {
            return {
                teacherId: this.$route.params.teacherId,
                url: '/api/teachers/',
                student: {},
            }
        },
        events: {
            'submitted'(student) {
                this.submit(student);
            },
        },
        methods: {
            submit(formData) {
                formData.set('_method', 'PUT');

                let url = this.url + this.teacherId;

                this.$http.post(url, formData)
                    .then(response => {
                        let alert = {
                            show: true,
                            type: 'success',
                            title: 'Success',
                            message: 'Teacher successfully updated.'
                        };

                        this.$broadcast('showAlert', alert);
                    }).catch(response => {
                        let errors = response.body;

                        this.$broadcast('formErrors', errors);
                    });
            }
        }
    }
</script>

<template>
    <div class="panel panel-default" v-cloak>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img
                        :src="student.avatar"
                        :alt="student.name"
                        :title="student.name"
                        class="img-thumbnail img-responsive image-preview">
                </div>

                <div class="col-md-6">
                    <p>
                        <label>Name:</label>
                        {{ student.name }}
                    </p>

                    <p>
                        <label>Email:</label>
                        {{ student.email }}
                    </p>

                    <p>
                        <label>Phone:</label>
                        {{ student.phone }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button class="btn btn-default" v-link="{ name: 'teacher_list' }">
            <i class="glyphicon glyphicon-chevron-left"></i>
            Back
        </button>
    </div>

    <notify :alert="alert"></notify>
</template>

<script>
    export default {
        created() {
            this.$http.get('/api/teachers/' + this.$route.params.teacherId)
                .then(response => {
                    this.student = response.data;

                    if(! this.student.avatar) {
                        this.student.avatar = 'default.png';
                    }

                    this.student.avatar = '/storage/avatars/' + this.student.avatar;
                })
                .catch(response => {
                    this.alert = {
                        show: true,
                        type: 'danger',
                        title: 'Error',
                        message: response.statusText
                    };

                    this.$broadcast('notify', this.alert);
                });
        },
        data() {
            return {
                student: {},
                alert: {
                    show: false,
                    type: null,
                    title: null,
                    message: null,
                },
            };
        }
    }
</script>

<template>
    <form @submit.prevent="submit" novalidate v-cloak>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                
                <div
                    class="form-group"
                    :class="{ 'has-error': errors['email'] }">
                    <label class="control-label" for="email">
                        Email
                    </label>

                    <input
                        v-model="student.email"
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="Email...">

                    <span class="help-block" v-for="error of errors['email']">
                        {{ error }}
                    </span>
                </div>

                <div
                    class="form-group"
                    :class="{ 'has-error': errors['password'] }">
                    <label class="control-label" for="password">
                        Password
                    </label>

                    <input
                        v-model="student.password"
                        type="password"
                        class="form-control"
                        id="password"
                        placeholder="Password...">

                    <span class="help-block" v-for="error of errors['password']">
                        {{ error }}
                    </span>
                </div>

            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row mrg-top-1em">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary">
                    <i class="glyphicon glyphicon-save"></i>
                    Login
                </button>
            </div>
        </div>
    </form>

    <notify :alert="alert"></notify>
</template>

<script>
    export default {
        props: {
            student: {
                type: Object,
                required: true
            },
        },
        created() {
            /*if(! this.student.birth_date) {
                this.student.birth_date = moment().format('YYYY-MM-DD')
            }*/
        },
        data() {
            return {
                alert: {
                    show: false,
                    type: null,
                    title: null,
                    message: null,
                },
                errors: {}
            }
        },
        computed: {
            imageSrc() {
                if(this.student.avatar instanceof File === false) {
                    if(this.student.avatar !== undefined) {
                        let avatar = this.student.avatar;

                        if(! avatar) {
                            avatar = 'default.png';
                        }

                        return '/storage/avatars/' + avatar;
                    }
                }
            }
        },
        methods: {
            submit() {
                let formData = new FormData();
                
                formData.set('email', this.student.email);
                formData.set('password', this.student.password);
                
                this.$dispatch('submitted', formData);
            }
        },
        events: {
            
            'formErrors'(errors) {
                this.errors = errors;
            },
            'showAlert'(alert) {
                this.alert = alert;

                this.$broadcast('notify', this.alert);

                this.errors = {};
            },
        },
    }
</script>

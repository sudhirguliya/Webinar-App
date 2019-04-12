const router = new VueRouter();

router.map({
    '/': {
        name: 'index',
        component: require('./components/CreateTeacher.vue')
    },
    '/teacher_list': {
        name: 'teacher_list',
        component: require('./components/TeacherList.vue')
    },
    '/list': {
        name: 'list',
        component: require('./components/Index.vue')
    },
    '/create': {
        name: 'create',
        component: require('./components/Create.vue')
    },
    '/show/:studentId': {
        name: 'show',
        component: require('./components/Show.vue')
    },
    '/edit/:studentId': {
        name: 'edit',
        component: require('./components/Edit.vue')
    },
    '/create_teacher': {
        name: 'create_teacher',
        component: require('./components/createTeacher.vue')
    },
    '/show_teacher/:teacherId': {
        name: 'show_teacher',
        component: require('./components/ShowTeacher.vue')
    },
    '/edit_teacher/:teacherId': {
        name: 'edit_teacher',
        component: require('./components/EditTeacher.vue')
    },
    '/login': {
        name: 'login',
        component: require('./components/Login.vue')
    },
});

var App = Vue.extend({});

router.start(App, '#app');

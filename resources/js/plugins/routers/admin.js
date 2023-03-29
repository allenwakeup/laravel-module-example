import { moduleUrl } from '@this/plugins/function'

export default [
    {
        path: moduleUrl('index'), name:"admin_index",meta:{title: '首页', key:'home'}, component:()=>import("@this/views/Admin/index"),children:[
            { path:moduleUrl('index'), name:"admin_default", meta: {title: '模块示例', key:'home_default'}, component:()=>import("@this/views/Admin/default") }, // 打开默认页面

            // 示例
            { path:moduleUrl('examples'), name:"admin_examples", meta:{title: '模块示例页签', key:'admin_examples', form: 'admin_examples_form'}, component:()=>import("@this/views/Admin/examples/index") },
            { path:moduleUrl('examples/form/:id?'), name:"admin_examples_form", component:()=>import("@this/views/Admin/examples/form") },
    ]},
];

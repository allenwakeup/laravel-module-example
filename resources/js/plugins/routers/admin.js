export default [
    // 核心模块
    {
        path:"/Admin/goodcatch/m/moduleexample/index",name:"goodcatch_m_moduleexample_index",component:()=>import("@this/views/Admin/index"),children:[
            {path:"/Admin/goodcatch/m/moduleexample/index",name:"goodcatch_m_moduleexample_default",component:()=>import("@this/views/Admin/default")}, // 打开默认页面

            // 示例
            {path:"/Admin/goodcatch/m/moduleexample/examples",name:"goodcatch_m_moduleexample_admin_examples", meta:{title: '示例页签', key:'goodcatch_m_moduleexample_admin_examples', form: 'goodcatch_m_moduleexample_admin_attachments_form'},component:()=>import("@this/views/Admin/examples/index")},
            {path:"/Admin/goodcatch/m/moduleexample/examples/form/:id?",name:"goodcatch_m_moduleexample_admin_attachments_form",component:()=>import("@this/views/Admin/examples/form")},
        ]
    }
];

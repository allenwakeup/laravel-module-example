<template>
    <div class="b2b2c">
        <div class="admin_table_page_title">
            <a-button @click="$router.back()" class="float_right" icon="arrow-left">返回</a-button>
            示例编辑
        </div>
        <div class="unline underm"></div>
        <div class="admin_form">
            <a-form-model ref="form" :model="form" :rules="rules" :label-col="{ span: 5 }" :wrapper-col="{ span: 12 }">
                <a-form-model-item label="名称" prop="name">
                    <a-input v-model="form.name"></a-input>
                </a-form-model-item>
                <a-form-model-item :wrapper-col="{ span: 12, offset: 5 }">
                    <a-button type="primary" @click="handleSubmit">提交</a-button>
                </a-form-model-item>
            </a-form-model>

        </div>
    </div>
</template>

<script>
import { MixinForm } from '@/plugins/mixins/admin'

export default {
    mixins: [ MixinForm ],
    components: {},
    props: {},
    data() {
      return {
          form:{
              name: '',
          },

          rules: {
              name: [
                  {required: true, message: '请输入用户名', trigger: 'blur'},
                  {min: 2, max: 200, message: '至少两个字，200个字以内', trigger: 'blur'},
              ],

          },
          id:0,
      };
    },
    watch: {},
    computed: {},
    methods: {
        handleSubmit(){

            this.$refs.form.validate(valid => {
                if (valid) {

                    const params = Object.assign({}, this.form);
                    if(params.password === ''){
                        delete params.password;
                    }

                    let api = this.$apiHandle(this.$api.moduleModuleExampleExamples,this.id);
                    if(api.status){
                        this.$put(api.url,params).then(res=>{
                            if(res.code === 200){
                                this.$message.success(res.msg)
                                this.sendMessageFormUpdated();
                                this.$router.back();
                                return this.$tabs.close();
                            }else{
                                return this.$message.error(res.msg)
                            }
                        })
                    }else{
                        this.$post(api.url,params).then(res=>{
                            if(res.code === 200){
                                this.$message.success(res.msg)
                                this.sendMessageFormUpdated();
                                this.$router.back();
                                return this.$tabs.close();
                            }else{
                                return this.$message.error(res.msg)
                            }
                        })
                    }
                } else {
                    this.$message.error('请按要求填写表单！');
                    return false;
                }
            });



        },
        get_info(){
            this.$get(this.$api.moduleModuleExampleExamples+'/'+this.id).then(res=>{
                res.data.password = undefined;
                this.form = res.data;
            })
        },
        // 获取列表
        onload(){
            // 判断你是否是编辑
            if(!this.$isEmpty(this.$route.params.id)){
                this.id = this.$route.params.id;
                this.get_info();
            }
        },


    },
    created() {
        this.onload();
    },
    mounted() {}
};
</script>
<style lang="scss" scoped>

</style>

<template>
    <div class="b2b2c">
        <div class="admin_table_page_title">示例列表</div>
        <div class="unline underm"></div>

        <div class="admin_table_list">
            <a-table
                size="small"
                :components="resizeableTitleComponents"
                :columns="getCachedTableColumns(table.columns)"
                :data-source="table.data"
                :scroll="{ y: sysWindowHeight - 280 }"
                :loading="table.loading"
                :pagination="false"
                :row-selection="{ columnWidth: 25, selectedRowKeys: table.selectedRowKeys, onChange: handleTableRowKeysChange }"
                :row-key="table.rowId">

                <template slot="title" slot-scope="currentPageData">

                    <search
                        :search-config="search.fields"
                        :auto-params="search.params"
                        @searchParams="handleTableSearchParams"
                        :export-config="exporting"
                        @handleExport="handleTableExport"/>

                    <div class="admin_table_handle_btn">
                        <a-button @click="$router.push($moduleUrl('examples/form'))" type="primary" size="small" icon="plus">添加</a-button>
                        <a-button v-if="!$isEmpty(table.actions.remove)" class="admin_delete_btn" size="small" type="danger" icon="delete" @click="handleRemoveTableRows">批量删除</a-button>
                    </div>
                </template>


                <span slot="action" slot-scope="rows">
                    <a-button icon="edit" size="small" @click="$router.push($moduleUrl('examples/form/'+rows.id))">编辑</a-button>
                </span>
            </a-table>
            <div class="admin_pagination" v-if="table.total > 0">
                <a-pagination v-model="table.params.page" :page-size.sync="table.params.per_page" :total="table.total" @change="handleTablePageChange" show-less-items />
            </div>
        </div>
    </div>
</template>

<script>
import Search from '@/components/admin/search'
import { MixinList, MixinStore } from '@/plugins/mixins/admin'
export default {
    mixins: [ MixinList, MixinStore ],
    components: { Search },
    props: {},
    data() {
        return {
            table: {
                actions: {
                    list: this.$api.moduleModuleExampleExamples,
                    remove: this.$api.moduleModuleExampleExamples
                },
                columns: [
                    {title: '名称', dataIndex: 'name', width: 90, key: 'name', ellipsis: true},
                    {title: '操作', scopedSlots: {customRender: 'action'}, width: 100, key: 'action'},
                ],
            },
            search: {
                fields: [
                    {
                        label: '名称',
                        name: 'name',
                        type: 'text'
                    }
                ]
            },
            exporting:{ // 数据导出
                url: this.$api.moduleModuleExampleExamples,
                columns: [
                    {
                        label: '名称',
                        name: 'username',
                        dataFormat: (val, row) => val,
                        width: (val, row) => Math.max(8, this.$isEmpty(val) ? 0 : val.length * 2)
                    }
                ],
                transform(data) {

                    return data.map(d => d);
                }
            },
            loading_status: {},
        }

    },
    watch: {},
    computed: {},
    methods: {
        onload(){

            // 加载混入中的表格数据
            this.loadTableData();
        }
    },
    created() {
        this.onload();
    },
    mounted() {}
};
</script>
<style lang="scss" scoped>

</style>

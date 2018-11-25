<template>
    <el-form :model="form" label-width="120px">
        <el-form-item label="Anonymous">
            <el-switch v-model="form.anonymous"></el-switch>
        </el-form-item>
        <el-form-item label="First Name" v-if="!form.anonymous">
            <el-input v-model="form.first"></el-input>
        </el-form-item>
        <el-form-item label="Last Name" v-if="!form.anonymous">
            <el-input v-model="form.last"></el-input>
        </el-form-item>
    </el-form>
</template>

<script>
    module.exports = {
        data () {
            return {
                form: {
                    first: '',
                    last: '',
                    anonymous: false
                }
            }
        }
    }
</script>
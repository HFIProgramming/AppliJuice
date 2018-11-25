<template>
    <el-form :model="form" label-width="120px">
        <el-form-item label="Anonymous">
            <el-switch v-model="anonymous"></el-switch>
        </el-form-item>
        <el-form-item label="First Name" v-if="!anonymous">
            <el-input v-model="form.first_name"></el-input>
        </el-form-item>
        <el-form-item label="Last Name" v-if="!anonymous">
            <el-input v-model="form.last_name"></el-input>
        </el-form-item>
        <!--@TODO Offers!-->
        <el-form-item>
            <el-button type="primary" @click="submit" :disbaled="submitDisabled">冲鸭!</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
    module.exports = {
        data () {
            return {
                form: {
                    first_name: '',
                    last_name: '',
                    offers: []
                },
                anonymous: false,
                submitDisabled:false
            }
        },
        methods: {
            submit() {
                this.submitDisabled = true;
                axios.post('/applicant/create', this.form).then(function (response) {
                   console.log(response);
                }).catch(error => {
                    console.log(error.message);
                });
            }
        }
    }
</script>
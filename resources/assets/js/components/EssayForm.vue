<template>
    <el-form :model="form" label-width="120px">
        <el-form-item label="Essay Prompt">
            <el-input type="textarea" v-model="form.prompt" :rows="3"></el-input>
        </el-form-item>
        <el-form-item label="Essay Text">
            <el-input type="textarea" v-model="form.text" :rows="10"></el-input>
        </el-form-item>
        <div class="line"></div>
        <el-form-item label="Tags">
            <template v-for="(tagGroup, i) in availableTags">
                <br>
                <el-form-item :label="tagGroup.nameText">
                    <el-row :gutter="20">
                        <el-col :span="8">
                            <el-input v-model="form.newTagInputs[tagGroup.name]" :placeholder="'A Different ' + tagGroup.nameText + '? Type and enter.'"
                                      @keyup.enter.native="addTag(i)"></el-input>
                        </el-col>
                        <el-checkbox-group v-model="form.tagList[tagGroup.name]">
                            <el-checkbox v-for="tag in tagGroup.tags" :key="tag.id" :label="tag"></el-checkbox>
                        </el-checkbox-group>
                    </el-row>
                </el-form-item>
            </template>
        </el-form-item>
        <el-form-item label="Remark">
            <el-input type="textarea" v-model="form.remark" :rows="3" placeholder="把自己批判一番？"></el-input>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="submit" :disabled="submitDisabled">冲鸭!</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
    module.exports = {
        data: function () {
            return {
                form: {
                    prompt: '',
                    text: '',
                    tagList: {
                        prompt_type: [],
                        college: [],
                        result: []
                    },
                    newTagInputs: {
                        prompt_type: '',
                        college: '',
                        result: ''
                    },
                    remark: ''
//                    @TODO 他妈的 大坑 有空再把上面两个做成动态
                },
                availableTags: this.existingTags,
                submitDisabled: false
//                [
//                    { name: "prompt_type", tags: ['WhyMajor', 'WhySchool', 'Extended'] },
//                    { name: "college", tags: ['Caltech', 'Cornell', 'Pomona', 'Tsinghua', 'Harvey Mudd', 'MIT'] },
//                    { name: "others", tags: ['admitted', 'rejected', 'waitlisted']}
//                ],
            }
        },
        props: ['existingTags', 'tagTypes'],
        methods: {
            addTag (tagGroupIndex) {
                const name = this.availableTags[tagGroupIndex].name.toString();
                this.availableTags[tagGroupIndex].tags.push(this.form.newTagInputs[name]);
                this.form.tagList[name].push(this.form.newTagInputs[name]);
                this.form.newTagInputs[name] = '';
            },
            submit () {
                axios.post('/essay/create', this.form).then(response => {
                    console.log(response.data);
                    this.$alert('点击确定以跳转', response.data, {
                        confirmButtonText: '确定',
                        callback: action => {
                        }});
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>
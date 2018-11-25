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
        <template v-for="(tagGroup,index) in availableTags">
            <br>
            <el-form-item :label="tagGroup.name">
                <el-row :gutter="20">
                    <el-col :span="4">
                        <el-input v-model="form.newTagInputs[tagGroup.name]" placeholder="A New Tag?" @keyup.enter.native="addTag(index)"></el-input>
                    </el-col>
                    <el-checkbox-group v-model="form.tagList[tagGroup.name]">
                        <el-checkbox v-for="tag in tagGroup.tags" :label="tag"></el-checkbox>
                    </el-checkbox-group>
                </el-row>
            </el-form-item>
        </template>
    </el-form-item>
</el-form>
</template>
<!--@TODO fix explicit key-->

<script>
    module.exports = {
        data: function () {
            return {
                form:{
                    prompt:'',
                    text:'',
                    tagList:{
                        prompt_type:[],
                        college:[],
                        others:[]
                    },
                    newTagInputs:{
                        prompt_type:'',
                        college:'',
                        others:''
                    }
                },
                availableTags:[
                    { name: "prompt_type", tags: ['WhyMajor', 'WhySchool', 'Extended'] },
                    { name: "college", tags: ['Caltech', 'Cornell', 'Pomona', 'Tsinghua', 'Harvey Mudd', 'MIT'] },
                    { name: "others", tags: ['admitted', 'rejected', 'waitlisted']}
                ],
            }
        },
        methods:{
            addTag: function(tagGroupIndex) {
                var name = this.availableTags[tagGroupIndex].name.toString();
                this.availableTags[tagGroupIndex].tags.push(this.form.newTagInputs[name]);
                this.form.tagList[name].push(this.form.newTagInputs[name]);
                this.form.newTagInputs[name]='';
            }
        }
    }
</script>
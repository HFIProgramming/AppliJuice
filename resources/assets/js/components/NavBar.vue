<template>
    <el-menu default-active="1" class="el-menu-demo" mode="horizontal">
        <el-menu-item index="1">AppliJuice</el-menu-item>
        <el-submenu index="2">
            <template slot="title">这是什么？我在干嘛？</template>
            <el-menu-item index="2-1">皮</el-menu-item>
            <el-menu-item index="2-2">学习前端</el-menu-item>
            <el-menu-item index="2-3">浪费时间</el-menu-item>
        </el-submenu>
        <el-menu-item index="3">真实Essays</el-menu-item>
        <el-menu-item index="4">看看我的申请者信息😄</el-menu-item>
    </el-menu>
</template>
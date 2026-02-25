package com.agrofinanzas.mobile.data.model

data class LoginRequest(
    val email: String,
    val password: String
)

data class LoginResponse(
    val user: UserDto? = null,
    val message: String? = null
)

data class UserDto(
    val id: Int,
    val name: String,
    val email: String
)

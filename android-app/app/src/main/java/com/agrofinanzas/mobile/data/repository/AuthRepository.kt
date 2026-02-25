package com.agrofinanzas.mobile.data.repository

import com.agrofinanzas.mobile.data.api.NetworkModule
import com.agrofinanzas.mobile.data.model.LoginRequest

class AuthRepository {
    suspend fun login(email: String, password: String) =
        NetworkModule.api.login(LoginRequest(email = email, password = password))
}

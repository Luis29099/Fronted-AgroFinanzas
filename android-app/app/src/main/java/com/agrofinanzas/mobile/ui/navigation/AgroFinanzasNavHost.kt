package com.agrofinanzas.mobile.ui.navigation

import androidx.compose.runtime.Composable
import androidx.compose.runtime.collectAsState
import androidx.compose.runtime.getValue
import androidx.lifecycle.viewmodel.compose.viewModel
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import com.agrofinanzas.mobile.ui.screens.auth.LoginScreen
import com.agrofinanzas.mobile.ui.screens.dashboard.DashboardScreen
import com.agrofinanzas.mobile.ui.viewmodel.AuthViewModel

@Composable
fun AgroFinanzasNavHost() {
    val navController = rememberNavController()
    val authViewModel: AuthViewModel = viewModel()
    val authState by authViewModel.uiState.collectAsState()

    NavHost(
        navController = navController,
        startDestination = "login"
    ) {
        composable("login") {
            LoginScreen(
                uiState = authState,
                onLogin = authViewModel::login,
                onSuccess = {
                    navController.navigate("dashboard") {
                        popUpTo("login") { inclusive = true }
                    }
                }
            )
        }

        composable("dashboard") {
            DashboardScreen()
        }
    }
}

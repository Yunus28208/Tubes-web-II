@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap');
    
    .premium-container {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #334155 50%, #1e293b 75%, #0f172a 100%);
        min-height: 100vh;
        position: relative;
        overflow: hidden;
    }
    
    .floating-particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }
    
    .particle {
        position: absolute;
        background: linear-gradient(45deg, #10b981, #06d6a0, #118ab2);
        border-radius: 50%;
        animation: float-particle 15s infinite linear;
        opacity: 0.1;
    }
    
    .particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 2s; }
    .particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 4s; }
    .particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 6s; }
    .particle:nth-child(5) { width: 4px; height: 4px; left: 50%; animation-delay: 8s; }
    .particle:nth-child(6) { width: 7px; height: 7px; left: 60%; animation-delay: 10s; }
    .particle:nth-child(7) { width: 3px; height: 3px; left: 70%; animation-delay: 12s; }
    .particle:nth-child(8) { width: 5px; height: 5px; left: 80%; animation-delay: 14s; }
    .particle:nth-child(9) { width: 4px; height: 4px; left: 90%; animation-delay: 16s; }
    
    @keyframes float-particle {
        0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
        10% { opacity: 0.1; }
        90% { opacity: 0.1; }
        100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
    }
    
    .glass-card {
        backdrop-filter: blur(25px);
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.1) 0%, 
            rgba(255, 255, 255, 0.05) 50%, 
            rgba(255, 255, 255, 0.1) 100%);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 
            0 25px 50px rgba(0, 0, 0, 0.3),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset,
            0 2px 4px rgba(255, 255, 255, 0.1) inset;
    }
    
    .premium-card {
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .premium-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.6s;
    }
    
    .premium-card:hover::before {
        left: 100%;
    }
    
    .premium-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 
            0 35px 70px rgba(0, 0, 0, 0.4),
            0 0 0 1px rgba(16, 185, 129, 0.3) inset,
            0 2px 4px rgba(16, 185, 129, 0.2) inset;
    }
    
    .gradient-text {
        background: linear-gradient(135deg, #10b981, #06d6a0, #118ab2, #0ea5e9);
        background-size: 300% 300%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradient-shift 3s ease-in-out infinite;
    }
    
    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .floating-avatar {
        animation: float-avatar 6s ease-in-out infinite;
        position: relative;
    }
    
    @keyframes float-avatar {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33% { transform: translateY(-10px) rotate(2deg); }
        66% { transform: translateY(-5px) rotate(-2deg); }
    }
    
    .premium-button {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #ef4444, #dc2626, #b91c1c);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 25px rgba(239, 68, 68, 0.3);
    }
    
    .premium-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .premium-button:hover::before {
        left: 100%;
    }
    
    .premium-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(239, 68, 68, 0.4);
        background: linear-gradient(135deg, #f87171, #ef4444, #dc2626);
    }
    
    .info-field {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.6), rgba(30, 41, 59, 0.4));
        border: 1px solid rgba(71, 85, 105, 0.3);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .info-field::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #10b981, #06d6a0, #118ab2);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }
    
    .info-field:hover::before {
        transform: scaleX(1);
    }
    
    .info-field:hover {
        border-color: rgba(16, 185, 129, 0.5);
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
        transform: translateX(5px);
    }
    
    .crown-icon {
        color: #fbbf24;
        filter: drop-shadow(0 0 10px rgba(251, 191, 36, 0.5));
        animation: crown-glow 2s ease-in-out infinite alternate;
    }
    
    @keyframes crown-glow {
        0% { filter: drop-shadow(0 0 10px rgba(251, 191, 36, 0.5)); }
        100% { filter: drop-shadow(0 0 20px rgba(251, 191, 36, 0.8)); }
    }
    
    .status-indicator {
        position: relative;
    }
    
    .status-indicator::before {
        content: '';
        position: absolute;
        top: 50%;
        left: -15px;
        transform: translateY(-50%);
        width: 8px;
        height: 8px;
        background: #10b981;
        border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }
    
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: translateY(-50%) scale(1); }
        50% { opacity: 0.5; transform: translateY(-50%) scale(1.2); }
    }
    
    .luxury-border {
        background: linear-gradient(45deg, #10b981, #06d6a0, #118ab2, #0ea5e9);
        background-size: 300% 300%;
        animation: border-flow 4s ease-in-out infinite;
        padding: 2px;
        border-radius: 24px;
    }
    
    @keyframes border-flow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .content-inner {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
        border-radius: 22px;
        padding: 2rem;
    }
    
    .diamond-sparkle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: #ffffff;
        border-radius: 50%;
        animation: sparkle 2s infinite;
    }
    
    @keyframes sparkle {
        0%, 100% { opacity: 0; transform: scale(0); }
        50% { opacity: 1; transform: scale(1); }
    }
    
    .diamond-sparkle:nth-child(1) { top: 20%; left: 20%; animation-delay: 0s; }
    .diamond-sparkle:nth-child(2) { top: 30%; right: 25%; animation-delay: 0.5s; }
    .diamond-sparkle:nth-child(3) { bottom: 25%; left: 30%; animation-delay: 1s; }
    .diamond-sparkle:nth-child(4) { bottom: 20%; right: 20%; animation-delay: 1.5s; }
</style>

<div class="premium-container">
    <!-- Floating Particles Background -->
    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    
    <!-- Background Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-emerald-400/20 to-teal-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-blue-400/20 to-cyan-600/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-purple-400/10 to-pink-600/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-2xl">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="floating-avatar inline-block mb-6 relative">
                    <!-- Diamond Sparkles -->
                    <div class="diamond-sparkle"></div>
                    <div class="diamond-sparkle"></div>
                    <div class="diamond-sparkle"></div>
                    <div class="diamond-sparkle"></div>
                    
                    <div class="luxury-border">
                        <div class="w-32 h-32 bg-gradient-to-br from-emerald-400 via-teal-500 to-blue-600 rounded-full flex items-center justify-center text-6xl relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent"></div>
                            <span class="relative z-10">👤</span>
                            <div class="absolute -top-2 -right-2">
                                <svg class="w-8 h-8 crown-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 16L3 6l5.5 4L12 4l3.5 6L21 6l-2 10H5zm2.7-2h8.6l.9-4.4L14 12l-2-3.4L10 12l-3.2-2.4L7.7 14z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h1 class="text-5xl font-bold mb-4">
                    <span class="gradient-text">User Profile</span>
                </h1>
                <p class="text-xl text-gray-300 font-light">Account</p>
                <div class="w-24 h-1 bg-gradient-to-r from-emerald-400 to-blue-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Main Profile Card -->
            <div class="luxury-border mb-8">
                <div class="content-inner">
                    <div class="glass-card premium-card rounded-2xl p-8 space-y-8">
                        <!-- Name Field -->
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white">Name</h3>
                            </div>
                            <div class="info-field px-6 py-4 rounded-xl">
                                <div class="status-indicator text-lg font-medium text-white pl-6">
                                    {{ $user->username }}
                                </div>
                            </div>
                        </div>

                        <!-- Role Field -->
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white">Role</h3>
                            </div>
                            <div class="info-field px-6 py-4 rounded-xl">
                                <div class="status-indicator text-lg font-medium text-white pl-6 capitalize">
                                    {{ $user->role }}
                                </div>
                            </div>
                        </div>

                        <!-- Status Indicators -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-6">
                            <div class="glass-card rounded-xl p-4 text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-green-400 font-semibold">Active</p>
                                <p class="text-gray-400 text-sm">Account Status</p>
                            </div>
                            
                            <div class="glass-card rounded-xl p-4 text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <p class="text-blue-400 font-semibold">Secured</p>
                                <p class="text-gray-400 text-sm">Data Protection</p>
                            </div>
                            
                            <div class="glass-card rounded-xl p-4 text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <p class="text-purple-400 font-semibold">Premium</p>
                                <p class="text-gray-400 text-sm">Access Level</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logout Section -->
            <div class="text-center">
                <form action="{{ route('auth.logout') }}" method="POST" class="inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" class="premium-button px-8 py-4 rounded-xl text-white font-bold text-lg flex items-center gap-3 mx-auto transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
                
                <p class="text-gray-400 text-sm mt-4">
                    Session will be securely terminated
                </p>
            </div>
        </div>
    </div>
</div>
@endsection